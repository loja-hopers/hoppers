<?php
include_once '../factory/conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica as credenciais
    $email = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM funcionario WHERE email = :email AND senha = :senha";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    // Se as credenciais estiverem corretas, redireciona para a página principal
    if ($stmt->rowCount() > 0) {
        header('Location: listafuncionarios.php');
        exit;
    } else {
        $mensagemErro = "Credenciais inválidas. Tente novamente.";
    }
}
?>