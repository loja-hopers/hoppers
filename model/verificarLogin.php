<?php
include_once '../factory/conexao.php';
include_once "../control/funcionario.php";

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $email = $_POST['usuario'];
    $senha = $_POST['senha'];

    $conn = new Conexao;


    $sql = "SELECT * FROM funcionario WHERE email = :email AND senha = :senha";
    $stmt = $conn->getConn()->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();
    $linha = $stmt->fetch(PDO::FETCH_ASSOC);


    if ($linha) {
        $id = $linha['id'];
        $cargo = $linha['cargo'];
        $_SESSION['id'] = $id;
        if($cargo == "administrador"){
            header('Location: ../view/menuAdm.php');
        } else{
            header('Location: ../view/menuFunc.php');
        }
        
        exit;
    } else {
        unset($_SESSION['id']);
        $mensagemErro = "Credenciais inválidas. Tente novamente.";
    }
}
?>