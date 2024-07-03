<?php
include_once '../factory/conexao.php';
include_once "../control/produto.php";

session_start();

$idFuncionario = $_SESSION['id'];
$descricaoHistorico = "Produto editado"; 
$dados = new Produto;

if (isset($_POST["id"], $_POST["descricao"], $_POST["preco"])) {
    $dados->setId($_POST["id"]);
    $dados->setDescricao($_POST["descricao"]);
    $dados->setPreco($_POST["preco"]);
    
    $id = $dados->getId();
    $descricao = $dados->getDescricao();
    $preco = $dados->getPreco();
    
    $imagem = isset($_FILES["imagem"]) ? $_FILES["imagem"] : null;

    if ($descricao != "") {
        $conn = new Conexao;

        if ($imagem && !empty($imagem["name"])) {
            $largura = 1500; 
            $altura = 1800; 
            $tamanho = 2048000;
            $error = array();

            if (!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/", $imagem["type"])) {
                $error[] = "Isso não é uma imagem."; 
            }

            $dimensoes = getimagesize($imagem["tmp_name"]);

            if ($dimensoes[0] > $largura) {
                $error[] = "A largura da imagem não deve ultrapassar " . $largura . " pixels"; 
            }

            if ($dimensoes[1] > $altura) {
                $error[] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
            }

            if ($imagem["size"] > $tamanho) {
                $error[] = "A imagem deve ter no máximo " . ($tamanho / 1024 / 1024) . " MB"; 
            }

            if (count($error) == 0) {
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext); 
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                $caminho_imagem = "../img/" . $nome_imagem;
                move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

                $query = "UPDATE produto SET descricao=:descricao, preco=:preco, imagem=:imagem WHERE id=:id";
                $editar = $conn->getConn()->prepare($query);
                $editar->bindParam(':descricao', $descricao, PDO::PARAM_STR);
                $editar->bindParam(':preco', $preco, PDO::PARAM_STR);
                $editar->bindParam(':imagem', $nome_imagem, PDO::PARAM_STR);
                $editar->bindParam(':id', $id, PDO::PARAM_INT);
                $editar->execute();
            } else {
                $totalerro = implode("\\n", $error);
                echo "<script>window.alert('$totalerro');
                window.location='editarProduto.php';</script>";
                exit();
            }
        } else {
            $query = "UPDATE produto SET descricao=:descricao, preco=:preco WHERE id=:id";
            $editar = $conn->getConn()->prepare($query);
            $editar->bindParam(':descricao', $descricao, PDO::PARAM_STR);
            $editar->bindParam(':preco', $preco, PDO::PARAM_STR);
            $editar->bindParam(':id', $id, PDO::PARAM_INT);
            $editar->execute();
        }

        if ($editar->rowCount()) {
            // Insere o histórico da edição do produto
            $query = "INSERT INTO historico(descricao, id_funcionario, id_produto) VALUES (:descricao, :idFuncionario, :idProduto)";
            $historico = $conn->getConn()->prepare($query);
            $historico->bindParam(':descricao', $descricaoHistorico, PDO::PARAM_STR);
            $historico->bindParam(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
            $historico->bindParam(':idProduto', $id, PDO::PARAM_INT);
            $historico->execute();
            echo "<script>alert('Produto atualizado com sucesso');
            location.href = '../view/produtos.php';</script>";
        } else {
            echo "<script>alert('Produto não atualizado.');</script>";
        }
    }
} else {
    echo "<script>window.alert('Dados insuficientes fornecidos.');
    window.location='editarProduto.php';</script>";
}
?>