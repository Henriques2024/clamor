<?php
session_start();    

// Incluindo a conexão com banco de dados
include_once("conexao.php");    

// Verifica se os dados do formulário foram enviados via POST
if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verifica se algum dos campos está vazio
    if(empty($nome) || empty($email) || empty($senha)) {
        echo json_encode(array("status" => "error", "message" => "Por favor, preencha todos os campos"));
        exit();
    }
   
    // Verificar se o e-mail já está cadastrado
    $verifica_email = $conn->prepare("SELECT id FROM usuarios WHERE email = :email");
    $verifica_email->bindParam(':email', $email);
    $verifica_email->execute();

    if ($verifica_email->rowCount() > 0) {
        // E-mail já cadastrado, exiba uma mensagem de erro
        echo json_encode(array("status" => "error", "message" => "Este email já está registrado no sistema"));
        exit();
    }

    // Criptografar a senha
    $senha_md5 = md5($senha);

    // Inserir o usuário no banco de dados
    $query_usuario = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':nome', $nome);
    $cad_usuario->bindParam(':email', $email);
    $cad_usuario->bindParam(':senha', $senha_md5);

    if ($cad_usuario->execute()) {
        // Recuperar o ID do usuário inserido
        $usuario_id = $conn->lastInsertId();

        // Inserir o grupo do usuário no banco de dados
        $grupo = "basico";
        $query_grupo = "INSERT INTO grupos (grupo, usuario_id) VALUES (:grupo, :usuario_id)";
        $cad_grupo = $conn->prepare($query_grupo);
        $cad_grupo->bindParam(':grupo', $grupo);
        $cad_grupo->bindParam(':usuario_id', $usuario_id);

        if ($cad_grupo->execute()) {
            // Sucesso ao cadastrar o usuário e grupo
            echo json_encode(array("status" => "success", "message" => "Usuário criado com sucesso! Faça o login"));
            exit();
        } else {
            // Erro ao cadastrar o grupo
            echo json_encode(array("status" => "error", "message" => "Erro ao cadastrar usuário no grupo"));
            exit();
        }
    } else {
        // Erro ao cadastrar o usuário
        echo json_encode(array("status" => "error", "message" => "Erro ao cadastrar usuário"));
        exit();
    }
} 

?>
