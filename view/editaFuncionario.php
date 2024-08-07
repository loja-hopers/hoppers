<?php
include_once '../components/header.php';
include_once '../factory/conexao.php';



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Funcionarios</title>
    <style>
        body {
            background-color: #fff;
        }

        h1 {
            font-size: 50px;
            text-align: center;
            margin: 20px 0;
            color: #000;
        }

        form {
            margin: 50px auto;
            width: 50%;
            max-width: 500px;
            text-align: center;
            background-color: #000;
            padding: 20px;
            border-radius: 20px;
        }

        .redirect {
            box-shadow: 1px 2px 6px #0000007d !important;
            margin: 20px auto;
            display: block;
            border: none;
            border-radius: 3px;
            line-height: 36px;
            padding: 2px;
            color: white;
            width: 88px;
            text-align: center;
            background-color: #DF696E;
            text-transform: uppercase;
        }

        form label {
            color: #fff;
        }

        form input {
            border: 1px solid #DF696E;
            border-radius: 5px;
            margin-bottom: 10px;
            color: white;
        }

        form button {
            background-color: #fff;
        }

        form button:hover {
            background-color: #D6656B;
        }
    </style>
</head>

<body>
    <h1>Editar Funcionário</h1>

    <div>
        <?php
            $idFuncionario = $_GET['id'];
            $query = "SELECT * FROM funcionario WHERE id = :id";
            $conn = new Conexao;
            $consulta = $conn->getConn()->prepare($query);
            $consulta->bindParam(':id', $idFuncionario, PDO::PARAM_INT);
            $consulta->execute();

            while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <form action="../model/editarFuncionario.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $idFuncionario ?>">
                    Nome:<br>
                    <input type="text" name="cxnome" value="<?= $row['nome'] ?>"><br/>
                    E-mail:<br/>
                    <input type="text" name="cxemail" value=" <?= $row['email'] ?>"/><br/>
                    Senha:<br/>
                    <input type="text" name="cxsenha" value="<?= $row['senha'] ?>"/><br/>
                    <br>
                    <img src="../img/<?= $row['foto'] ?>" alt="Imagem atual" width="100"><br />
                    <br>
                    <label for="imagem">Escolha uma imagem:</label>
                    <input type="file" name="cxfoto" id="cxfoto"><br><br>
                    <button>Editar</button>
                </form>
            <?php
            }
            ?>
    </div>

    <?php include_once "../components/footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>