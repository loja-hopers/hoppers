<?php
include_once "../factory/conexao.php";
include_once "../control/produto.php";

$dados = new Produto;

$dados->setDescricao($_POST["cxdescricao"]);
$dados->setPreco($_POST["cxpreco"]);
$dados->setImagem($_POST["cximagem"]);

$descricao = $dados->getDescricao();
$preco = $dados->getPreco();
$imagem = $dados->getImagem();


if($dados->getDescricao() != "")
{
       $conn = new Conexao;
       $query = "insert into produto(descricao, preco, imagem)
       values
       (:descricao, :preco, :imagem)";
       $cadastrar = $conn->getConn()->prepare($query);
       $cadastrar->bindParam(':descricao',$descricao,PDO::PARAM_STR);
       $cadastrar->bindParam(':preco',$preco,PDO::PARAM_STR);
       $cadastrar->bindParam(':imagem',$imagem,PDO::PARAM_STR);
       $cadastrar->execute();
       if($cadastrar->rowCount())
       {
               echo "Dados cadastrados com sucesso!"; 
       }
       else{
          echo "Dados não cadastrados";
       }
}
else
{
    "Campos em branco";
}



?>