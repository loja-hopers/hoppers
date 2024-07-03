<?php
    include_once '../factory/conexao.php';
    include_once "../control/funcionario.php";

    

    $dados = new Funcionario;

    $dados->setId($_GET['id']);

    $id = $dados->getId();

    if($id != ""){
       $conn = new Conexao;
       $query = "delete from funcionario where id=:id";
       $excluir = $conn->getConn()->prepare($query);
       $excluir->bindParam(':id',$id,PDO::PARAM_INT);
       $excluir->execute();
       if($excluir) {
        echo "<script>window.alert('Dados excluídos com sucesso');
            window.location='../view/listafuncionarios.php';</script>";
    } else {
        echo "<script>alert('Dado não encontado');</script>";
    }
}

?>
