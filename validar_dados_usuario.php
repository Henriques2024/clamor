<?php
session_start();
include_once "conexao.php";

$nome = $_POST['nome'];
$email = $_POST['email'];

// Registrar os valores recebidos
error_log("Nome recebido: " . $nome);
error_log("Email recebido: " . $email);

// Consulta no banco de dados para verificar se o nome e email existem
$sql = "SELECT COUNT(*) AS total FROM usuarios WHERE nome = ? AND email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nome, $email);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

error_log("Resultado da consulta: " . $row['total']);

if ($row['total'] > 0) {
    // Nome e email válidos
    error_log("Usuário válido!");
    echo json_encode(array('valid' => true));
} else {
    // Nome e/ou email inválidos
    error_log("Usuário inválido!");
    echo json_encode(array('valid' => false));
}
?>