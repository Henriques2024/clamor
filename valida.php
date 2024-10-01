<?php
session_start();    
// Incluindo a conexão com banco de dados
include_once("conexao1.php");    

// O campo usuário e senha preenchido entra no if para validar
if((isset($_POST['email'])) && (isset($_POST['senha']))){
    $usuario = mysqli_real_escape_string($conn, $_POST['email']); // Escapar de caracteres especiais, como aspas, prevenindo SQL injection
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        
    // Verificando se os campos de usuário e senha estão vazios
    if(empty($usuario) && empty($senha)) {
        echo json_encode(array("status" => "error", "message" => "Por favor! Preencha todos os campos"));
        exit(); // Encerrando o script
    } elseif (empty($usuario)) {
        echo json_encode(array("status" => "error", "message" => "Por favor, preencha o campo Email"));
        exit();
    } elseif (empty($senha)) {
        echo json_encode(array("status" => "error", "message" => "Por favor, preencha o campo Senha"));
        exit();
    }
    
    $senha = md5($senha);
    // Buscar na tabela usuario o usuário que corresponde com os dados digitados no formulário
    $result_usuario = "SELECT * FROM usuarios INNER JOIN grupos 
                            ON usuarios.id = grupos.usuario_id 
                            WHERE email = '$usuario' && senha = '$senha' LIMIT 1";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    $resultado = mysqli_fetch_assoc($resultado_usuario);
    
    // Encontrado um usuário na tabela usuário com os mesmos dados digitados no formulário
    if(isset($resultado)){
        $_SESSION['usuarioId'] = $resultado['id'];
        $_SESSION['usuarioNome'] = $resultado['nome'];
        $_SESSION['usuarioNiveisAcessoId'] = $resultado['grupo'];
        $_SESSION['usuarioEmail'] = $resultado['email'];
        $_SESSION['usuarioSenha'] = $resultado['senha'];
        
        echo json_encode(array("status" => "success", "redirect" => getRedirectURL($_SESSION['usuarioNiveisAcessoId'])));
        exit();
    } else {    
        // Mensagem de erro
        echo json_encode(array("status" => "error", "message" => "Usuário ou senha inválida"));
        exit();
    }
} else {
    // Mensagem de erro se os campos não forem enviados
    echo json_encode(array("status" => "error", "message" => "Campos não enviados"));
    exit();
}

// Função para obter a URL de redirecionamento com base no nível de acesso do usuário
function getRedirectURL($nivelAcesso) {
    switch ($nivelAcesso) {
        case "administrador":
            return "Administrador/index.php";
            break;
        case "basico":
            return "basico/basico.php";
            break;
        case "intermedio":
            return "intermedio/intermedio.php";
            break;
        default:
            return "avançado/avançado.php";
            break;
    }
}
?>
