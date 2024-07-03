<?php
include_once '../factory/conexao.php';
include_once "../control/funcionario.php";

session_start();

$dados = new Funcionario;

if (isset($_POST["id"], $_POST["cxnome"], $_POST["cxemail"], $_POST["cxsenha"])) {
    $dados->setId($_POST["id"]);
    $dados->setNome($_POST["cxnome"]);
    $dados->setEmail($_POST["cxemail"]);
    $dados->setSenha($_POST["cxsenha"]);
    
    $id = $dados->getId();
    $nome = $dados->getNome();
    $email = $dados->getEmail();
    $senha = $dados->getSenha();

    $foto = isset($_FILES["cxfoto"]) ? $_FILES["cxfoto"] : null;

    if ($nome != "" && $email != "" && $senha != "") {
        $conn = new Conexao;
        $query = "UPDATE funcionario SET nome=:nome, email=:email, senha=:senha WHERE id=:id";
        if ($foto && !empty($foto["name"])) {
            $largura = 1500; 
            $altura = 1800; 
            $tamanho = 2048000;
            $error = array();

            if (!preg_match("/^image\/(jpg|jpeg|png|gif|bmp)$/", $foto["type"])) {
                $error[] = "Isso não é uma imagem."; 
            }

            $dimensoes = getimagesize($foto["tmp_name"]);

            if ($dimensoes[0] > $largura) {
                $error[] = "A largura da imagem não deve ultrapassar " . $largura . " pixels"; 
            }

            if ($dimensoes[1] > $altura) {
                $error[] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
            }

            if ($foto["size"] > $tamanho) {
                $error[] = "A imagem deve ter no máximo " . ($tamanho / 1024 / 1024) . " MB"; 
            }

            if (count($error) == 0) {
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext); 
                $nome_foto = md5(uniqid(time())) . "." . $ext[1];
                $caminho_foto = "../img/" . $nome_foto;
                move_uploaded_file($foto["tmp_name"], $caminho_foto);

                $query = "UPDATE funcionario SET nome=:nome, email=:email, senha=:senha, foto=:foto WHERE id=:id";
                $editar = $conn->getConn()->prepare($query);
                $editar->bindParam(':nome', $nome, PDO::PARAM_STR);
                $editar->bindParam(':email', $email, PDO::PARAM_STR);
                $editar->bindParam(':senha', $senha, PDO::PARAM_STR);
                $editar->bindParam(':foto', $nome_foto, PDO::PARAM_STR);
                $editar->bindParam(':id', $id, PDO::PARAM_INT);
                $editar->execute();
            } else {
                $totalerro = implode("\\n", $error);
                echo "<script>window.alert('$totalerro');
                window.location='editarFuncionario.php';</script>";
                exit();
            }
        } else {
            $editar = $conn->getConn()->prepare($query);
            $editar->bindParam(':nome', $nome, PDO::PARAM_STR);
            $editar->bindParam(':email', $email, PDO::PARAM_STR);
            $editar->bindParam(':senha', $senha, PDO::PARAM_STR);
            $editar->bindParam(':id', $id, PDO::PARAM_INT);
            $editar->execute();
        }

        if ($editar->rowCount()) {
            echo "<script>alert('Dados atualizados com sucesso');
            location.href = '../view/listafuncionarios.php';</script>";
        } else {
            echo "<script>alert('Dados não atualizados.');</script>";
        }
    } else {
        echo "<script>window.alert('Dados insuficientes fornecidos.');
        window.location='editarFuncionario.php';</script>";
    }
} else {
    echo "<script>window.alert('Dados insuficientes fornecidos.');
    window.location='editarFuncionario.php';</script>";
}
?>