<?php
include_once "../factory/conexao.php";
include_once "../control/historico.php";

session_start();

$dados = new Historico;

$dados->setDescricao($_POST["cxnome"]);
$dados->setProdutoId($_POST["cxemail"]);
$dados->setFuncionarioId($_SESSION['id']);

$descricao = $dados->getDescricao();
$idFuncionario = $dados->getProdutoId();
$idProduto = $dados->getFuncionarioId();


if($dados->getNome() != "")
{
       $conn = new Conexao;
       $query = "insert into historico(descricao, id_funcionario, id_produto) values(:descricao, :id_funcionario, :id_produto)";
       $cadastrar = $conn->getConn()->prepare($query);
       $cadastrar->bindParam(':descricao',$descricao,PDO::PARAM_STR);
       $cadastrar->bindParam(':id_funcionario',$idFuncionario,PDO::PARAM_STR);
       $cadastrar->bindParam(':id_produto',$idProduto,PDO::PARAM_STR);
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