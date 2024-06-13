<?php
    include_once '../factory/conexao.php';
    include_once "../control/funcionario.php";

    $dados = new Funcionario;

    $dados->setId($_POST["cxid"]);
    $dados->setNome($_POST["cxnome"]);
    $dados->setEmail($_POST["cxemail"]);
    $dados->setSenha($_POST["cxsenha"]);
    $dados->setCargo($_POST["cxcargo"]);
    $dados->setFoto($_POST["cxfoto"]);

    $id = $dados->getId();
    $nome = $dados->getNome();
    $email = $dados->getEmail();
    $senha = $dados->getSenha();
    $cargo = $dados->getCargo();
    $foto = $dados->getFoto();

    

    if($dados->getId() != ""){
       $conn = new Conexao;
       $query = "update from produto where id='$id'";
       $excluir = $conn->getConn()->prepare($query);
       $excluir->execute();
       if ($excluir) {
        echo "<script>alert('Produto excluído com sucesso');</script>";
        echo "<a href='../view/telamenu.php'>Voltar</a>";
    } else {
        echo "<script>alert('Dado não encontado');</script>";
    }
}

?>