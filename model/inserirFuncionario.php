<?php
include_once "../factory/conexao.php";
include_once "../control/funcionario.php";

$dados = new Funcionario;

$dados->setNome($_POST["cxnome"]);
$dados->setEmail($_POST["cxemail"]);
$dados->setSenha($_POST["cxsenha"]);
$dados->setCargo($_POST["cxcargo"]);
$dados->setFoto($_POST["cxfoto"]);

$nome = $dados->getNome();
$email = $dados->getEmail();
$senha = $dados->getSenha();
$cargo = $dados->getCargo();
$foto = $dados->getFoto();


if($dados->getNome() != "")
{
       $conn = new Conexao;
       $query = "insert into funcionario(nome, email, senha, cargo, foto)
       values
       (:nome, :email, :senha, :cargo, :foto)";
       $cadastrar = $conn->getConn()->prepare($query);
       $cadastrar->bindParam(':nome',$nome,PDO::PARAM_STR);
       $cadastrar->bindParam(':email',$email,PDO::PARAM_STR);
       $cadastrar->bindParam(':senha',$senha,PDO::PARAM_STR);
       $cadastrar->bindParam(':cargo',$cargo,PDO::PARAM_STR);
       $cadastrar->bindParam(':foto',$foto,PDO::PARAM_STR);
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