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
       $query = "update from produto SET nome=:nome, email=:email, senha=:senha, cargo=:cargo, foto=:foto WHERE id=:id";
       $excluir = $conn->getConn()->prepare($query);
       $excluir->bindParam(':id',$id,PDO::PARAM_STR);
       $excluir->bindParam(':nome',$nome,PDO::PARAM_STR);
       $excluir->bindParam(':email',$email,PDO::PARAM_STR);
       $excluir->bindParam(':senha',$senha,PDO::PARAM_STR);
       $excluir->bindParam(':cargo',$cargo,PDO::PARAM_STR);
       $excluir->bindParam(':foto',$foto,PDO::PARAM_STR);
       $excluir->execute();
       if ($excluir) {
        echo "<script>alert('Dados editados com sucesso');</script>";
        echo "<a href='../view/menu.php'>Voltar</a>";
    } else {
        echo "<script>alert('Dado não encontado');</script>";
    }
}

?>