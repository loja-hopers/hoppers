<?php
include_once '../factory/conexao.php';
include_once "../control/produto.php";

session_start();

$idFuncionario = $_SESSION['id'];
$descricao = "Produto excluído";

$dados = new Produto;
$dados->setId($_GET['id']);
$id = $dados->getId();

if ($id != "") {
    $conn = new Conexao;
    try {
        // Insere o histórico da exclusão do produto antes de excluir o produto
        $query = "insert into historico(descricao, id_funcionario, id_produto) values (:descricao, :idFuncionario, :idProduto)";
        $historico = $conn->getConn()->prepare($query);
        $historico->bindParam(':descricao', $descricao, PDO::PARAM_STR);
        $historico->bindParam(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
        $historico->bindParam(':idProduto', $id, PDO::PARAM_INT);
        $historico->execute();

        // Agora exclui o produto (os registros relacionados no histórico serão excluídos automaticamente)
        $query = "delete from produto where id=:id";
        $excluirProduto = $conn->getConn()->prepare($query);
        $excluirProduto->bindParam(':id', $id, PDO::PARAM_INT);
        $excluirProduto->execute();


        echo "<script>window.alert('Produto excluído com sucesso');
            window.location='../view/produtos.php';</script>";
        // echo "<script>alert('Produto excluído com sucesso');</script>";
        // echo "<a href='../view/produtos.php'>Voltar</a>";
    } catch (PDOException $e) {
        echo "<script>alert('Erro ao excluir produto: " . $e->getMessage() . "');</script>";
    }
}
?>
