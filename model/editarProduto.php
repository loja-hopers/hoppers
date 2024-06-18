<?php
    include_once '../factory/conexao.php';
    include_once "../control/produto.php";

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
       $query = "update from produto SET descricao=:descricao, preco=:preco, imagem=:imagem WHERE id=:id";
       $editar = $conn->getConn()->prepare($query);
       $editar->bindParam(':id',$id,PDO::PARAM_STR);
       $editar->bindParam(':descricao',$descricao,PDO::PARAM_STR);
       $editar->bindParam(':preco',$preco,PDO::PARAM_STR);
       $editar->bindParam(':imagem',$imagem,PDO::PARAM_STR);
       $editar->execute();
       if ($editar) {
        echo "<script>alert('Produto editado com sucesso');</script>";
        echo "<a href='../view/telamenu.php'>Voltar</a>";
    } else {
        echo "<script>alert('Dado não encontado');</script>";
    }
}

?>