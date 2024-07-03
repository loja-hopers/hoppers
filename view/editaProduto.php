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
    <title>Editar Produto</title>
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
    <h1>Editar Produto</h1>

    <div>
        <?php
        $idProduto = $_GET['id'];
        $conn = new Conexao;
        $query = "SELECT * FROM produto WHERE id = :id";
        $consulta = $conn->getConn()->prepare($query);
        $consulta->bindParam(':id', $idProduto, PDO::PARAM_INT);
        $consulta->execute();

        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <form action="../model/editarProduto.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $row['id'] ?>"><br />
                Descrição:<br>
                <input type="text" name="descricao" value="<?= $row['descricao'] ?>"><br />
                Preço:<br />
                <input type="text" name="preco" value="<?= $row['preco'] ?>"><br />
                Imagem atual:<br />
                <img src="../img/<?= $row['imagem'] ?>" alt="Imagem atual" width="100"><br />
                Escolha uma nova imagem:<br />
                <input type="file" name="imagem"><br /><br />

                <button type="submit">Editar</button>
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