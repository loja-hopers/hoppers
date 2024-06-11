<?php
    include_once '../factory/conexao.php';

    $dados = new Produto;

    $dados->setId($_POST["cxid"]);

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