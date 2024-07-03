<?php
include_once "../factory/conexao.php";
include_once "../control/funcionario.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dados = new Funcionario;

    $dados->setNome($_POST["cxnome"]);
    $dados->setEmail($_POST["cxemail"]);
    $dados->setSenha($_POST["cxsenha"]);
    $dados->setCargo($_POST["cxcargo"]);
    $dados->setFoto($_FILES["cxfoto"]);

    $nome = $dados->getNome();
    $email = $dados->getEmail();
    $senha = $dados->getSenha();
    $cargo = $dados->getCargo();
    $foto = $dados->getFoto();

    if ($nome != "") {
        $conn = new Conexao;
        $query = "insert into funcionario(nome, email, senha, cargo, foto) values(:nome, :email, :senha, :cargo, :foto)";
        if (!empty($foto["name"])) {
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
                $error[] = "A imagem deve ter no máximo " . $tamanho . " bytes"; 
            }

            if (count($error) == 0) {
                preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext); 
                $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
                $caminho_imagem = "../img/" . $nome_imagem;
                move_uploaded_file($foto["tmp_name"], $caminho_imagem);

                $cadastrar = $conn->getConn()->prepare($query);
                $cadastrar->bindParam(':nome', $nome, PDO::PARAM_STR);
                $cadastrar->bindParam(':email', $email, PDO::PARAM_STR);
                $cadastrar->bindParam(':senha', $senha, PDO::PARAM_STR);
                $cadastrar->bindParam(':cargo', $cargo, PDO::PARAM_STR);
                $cadastrar->bindParam(':foto', $nome_imagem, PDO::PARAM_STR);
                $cadastrar->execute();

                if ($cadastrar->rowCount()) {
                    echo "<script>alert('Funcionário cadastrado com sucesso'); location.href = '../view/menuAdm.php';</script>";
                } else {
                    echo "<script>alert('Funcionário não foi cadastrado.');</script>";
                }
            } else {
                $totalerro = implode("\\n", $error);
                echo "<script>window.alert('$totalerro');window.location='inserirFuncionario.php';</script>";
            }
        } else {
            echo "<script>window.alert('Você não selecionou nenhum arquivo!');window.location='inserirFuncionario.php';</script>";
        }
    }
}
?>