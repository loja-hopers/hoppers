<?php
    include_once '../factory/conexao.php';

    $dados = new Produto;

    $dados->setId($_POST["cxid"]);
    $dados->setDescricao($_POST["cxdescricao"]);
    $dados->setPreco($_POST["cxpreco"]);
    $dados->setImagem($_POST["cximagem"]);

    $id = $dados->getId();
    $descricao = $dados->getDescricao();
    $preco = $dados->getPreco();
    $imagem = $dados->getImagem();

    

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