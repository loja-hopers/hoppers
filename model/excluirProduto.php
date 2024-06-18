<?php
    include_once '../factory/conexao.php';
    include_once "../control/produto.php";

    $dados = new Produto;

    $dados->setId($_GET['id']);

    $id = $dados->getId();

    if($dados->getId() != ""){
       $conn = new Conexao;
       $query = "delete from produto where id='$id'";
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