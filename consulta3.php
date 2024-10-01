<?php
session_start();
include_once "conexao.php";
require_once "fasma.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $val = validarRecibo("comprovativo");
    if ($val["STATUS"] == 200) {
        $iban = $val["B_IBAN"];

        $validIbans = [
            "AO06.0055.0000.1896.5013.1015.1",
            "218965013 10 001",
            "0055.0000.1896.5013.1015.1",
            "06.0055.0000.1896.5013.1015.1",
            "AO06005500001896501310151",
            "06005500001896501310151",
            "005500001896501310151"
        ];

        // Função para normalizar o IBAN removendo espaços e pontos
        function normalizeIban($iban) {
            return str_replace([' ', '.'], '', $iban);
        }

        // Verificação se o IBAN é válido
        $ibanNormalized = normalizeIban($iban);
        $valid = false;
        foreach ($validIbans as $validIban) {
            if ($ibanNormalized == normalizeIban($validIban)) {
                $valid = true;
                break;
            }
        }

        if ($valid) {
            // Verificar se o nome e email já existem na base de dados
            if (isset($_POST['nome']) && isset($_POST['email'])) {
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                
                if (empty($nome) || empty($email)) {
                    $resp = ["status" => "error", "msg" => "Todos os campos do formulário devem ser preenchidos."];
                    echo json_encode($resp);
                    exit();
                }

                // Verificar se o usuário existe
                $queryVerificarUsuario = "SELECT id FROM usuarios WHERE nome = :nome AND email = :email";
                $stmtVerificarUsuario = $conn->prepare($queryVerificarUsuario);
                $stmtVerificarUsuario->bindParam(':nome', $nome, PDO::PARAM_STR);
                $stmtVerificarUsuario->bindParam(':email', $email, PDO::PARAM_STR);
                $stmtVerificarUsuario->execute();
                $idUsuario = $stmtVerificarUsuario->fetchColumn();

                if ($idUsuario) {
                    // Verificar se o usuário já possui um pacote desactivo.
                    $queryVerificarPacote = "SELECT id, tipo FROM pacotes WHERE id_usuario = :id_usuario AND situacao = 'desactivo'";
                    $stmtVerificarPacote = $conn->prepare($queryVerificarPacote);
                    $stmtVerificarPacote->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
                    $stmtVerificarPacote->execute();
                    $pacoteExistente = $stmtVerificarPacote->fetch(PDO::FETCH_ASSOC);

                    if ($pacoteExistente) {
                        // Verificar se o tipo de pacote é diferente
                        if ($pacoteExistente['tipo'] == 'basico') {
                            $resp = ["status" => "error", "msg" => "O usuário já possui um pacote básico desactivo."];
                            echo json_encode($resp);
                            exit();
                        } else {
                            $resp = ["status" => "error", "msg" => "O usuário fornecido já possui um pacote desactivo."];
                            echo json_encode($resp);
                            exit();
                        }
                    }

                    $valor = str_replace('.', '', $val["MONTANTE"]);
                    $valor = str_replace(',', '.', $valor);

                    // Verificar se o valor depositado é inferior ao valor da classe selecionada
                    if ($valor < 1000) {
                        $resp = ["status" => "error", "msg" => "Valor inferior. Por favor, transfira um valor correspondente ao pacote"];
                        echo json_encode($resp);
                        exit();
                    }

                    if ($val["APLICATIVO"] == "MULTICAIXA EXPRESS") {
                        $dataFormatada = $val['DATA']['dataHora'];
                        $dados_conta = $val['O_IBAN'];
                        $nome_ordenta = $val['O_NOME'];
                    } else {
                        $dataFormatada = formatarData($val['DATA']['data']) . " " . $val['DATA']['hora'];
                        $dados_conta = $val['O_CONTA'];
                        $nome_ordenta = $val['O_NOME'];
                    }

                    try {
                        // Verificar se a transação já existe
                        $queryVerificarTransacao = "SELECT COUNT(*) FROM pagamentos WHERE transacao = :transacao";
                        $stmtVerificarTransacao = $conn->prepare($queryVerificarTransacao);
                        $stmtVerificarTransacao->bindParam(':transacao', $val['TRANSACAO'], PDO::PARAM_STR);
                        $stmtVerificarTransacao->execute();
                        $numeroDeResultados = $stmtVerificarTransacao->fetchColumn();

                        if ($numeroDeResultados == 0) {
                            // Iniciar a transação
                            $conn->beginTransaction();

                            // Inserir pagamento
                            $queryPagamento = "INSERT INTO pagamentos (valor, data_hora, transacao) VALUES (:valor, :data_hora, :transacao)";
                            $stmtPagamento = $conn->prepare($queryPagamento);
                            $stmtPagamento->bindParam(':valor', $val['MONTANTE'], PDO::PARAM_STR);
                            $stmtPagamento->bindParam(':data_hora', $dataFormatada, PDO::PARAM_STR);
                            $stmtPagamento->bindParam(':transacao', $val['TRANSACAO'], PDO::PARAM_STR);
                            $stmtPagamento->execute();

                            // Inserir pacote
                            $queryPacote = "INSERT INTO pacotes (tipo, validade, valor, situacao, id_usuario) 
                            VALUES (:tipo, :validade, :valor, :situacao, :id_usuario)";
                            $stmtPacote = $conn->prepare($queryPacote);
                            $tipo = "basico";
                            $validade = "mensal";
                            $situacao = "desactivo";
                            $stmtPacote->bindParam(':tipo', $tipo, PDO::PARAM_STR);
                            $stmtPacote->bindParam(':validade', $validade, PDO::PARAM_STR);
                            $stmtPacote->bindParam(':valor', $val['MONTANTE'], PDO::PARAM_STR);
                            $stmtPacote->bindParam(':situacao', $situacao, PDO::PARAM_STR);
                            $stmtPacote->bindParam(':id_usuario', $idUsuario, PDO::PARAM_INT);
                            $stmtPacote->execute();

                            // Commit da transação
                            $conn->commit();

                            // Retornar resposta JSON de sucesso
                            $resp = ["status" => "success",
                                    "msg" => "Pacote pago!"];
                            echo json_encode($resp);
                            exit();
                        } else {
                            $resp = ["status" => "error", "msg" => "Este comprovativo já foi validado."];
                            echo json_encode($resp);
                            exit();
                        }
                    } catch (PDOException $e) {
                        // Rollback da transação em caso de erro
                        $conn->rollback();
                        $resp = ["status" => "error", "msg" => "Ocorreu um erro ao cadastrar o pacote: " . $e->getMessage()];
                        echo json_encode($resp);
                        exit();
                    }
                } else {
                    $resp = ["status" => "error", "msg" => "Usuário não encontrado. Por favor, preencha dados correctos."];
                    echo json_encode($resp);
                    exit();
                }
            } else {
                $resp = ["status" => "error", "msg" => "Todos os campos do formulário devem ser preenchidos."];
                echo json_encode($resp);
                exit();
            }
        } else {
            $resp = ["status" => "error", "msg" => "IBAN do beneficiário não pertence à empresa."];
            echo json_encode($resp);
            exit();
        }
    } else {
        $resp = ["status" => "error", "msg" => $val["MSG"]];
        echo json_encode($resp);
        exit();
    }
}