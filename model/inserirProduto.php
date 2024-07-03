<?php
include_once "../factory/conexao.php";
include_once "../control/produto.php";
include_once "../control/historico.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dados = new Produto;

    $historico = new Historico;
    $idFuncionario = $_SESSION['id'];
    $descricaoHistorico = "Produto inserido";

    $dados->setDescricao($_POST["cxdescricao"]);
    $dados->setPreco($_POST["cxpreco"]);
    $dados->setImagem($_FILES["cximagem"]);

    $descricao = $dados->getDescricao();
    $preco = $dados->getPreco();
    $imagem = $dados->getImagem();

    if ($descricao != "") {
        $conn = new Conexao;
        $query = "insert into produto(descricao, preco, imagem) values (:descricao, :preco, :imagem)";
        if (!empty($imagem["name"])) {
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
                $error[] = "A imagem deve ter no máximo " . $tamanho . " bytes"; 
            }

            if (count($error) == 0) {
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext); 
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                $caminho_imagem = "../img/" . $nome_imagem;
                move_uploaded_file($imagem["tmp_name"], $caminho_imagem);

                $cadastrar = $conn->getConn()->prepare($query);
                $cadastrar->bindParam(':descricao',$descricao,PDO::PARAM_STR);
                $cadastrar->bindParam(':preco',$preco,PDO::PARAM_STR);
                $cadastrar->bindParam(':imagem',$nome_imagem,PDO::PARAM_STR);
                $cadastrar->execute();

                if ($cadastrar->rowCount()) {
                    // Insere o histórico da inserção do produto
                    $idProduto = $conn->getConn()->lastInsertId();
                    $query = "INSERT INTO historico(descricao, id_funcionario, id_produto) VALUES (:descricao, :idFuncionario, :idProduto)";
                    $historico = $conn->getConn()->prepare($query);

                    $historico->bindParam(':descricao', $descricaoHistorico, PDO::PARAM_STR);
                    $historico->bindParam(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
                    $historico->bindParam(':idProduto', $idProduto, PDO::PARAM_INT);
                    $historico->execute();
                    echo "<script>alert('Produto cadastrado com sucesso');
                    location.href = '../view/produtos.php';</script>";
                } else {
                    echo "<script>alert('Produto não cadastrado.');</script>";
                }
            } else {
                $totalerro = implode("\\n", $error);
                echo "<script>window.alert('$totalerro');
                window.location='inserirProduto.php';</script>";
            }
        } else {
            echo "<script>window.alert('Você não selecionou nenhum arquivo!');
            window.location='inserirProduto.php';</script>";
        }
    }
}


?>