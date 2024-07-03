<?php
include_once '../components/header.php';
include_once '../factory/conexao.php';

session_start();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Funcionários</title>
    <style>
        h1 {
            margin: 20px 0;
            color: #000000; 
        }

        img {
            width: 100%;
            max-width: 150px; 
            height: auto;
        }

        table,
        form {
            width: 100%;
            text-align: center;
            margin: auto;
            background-color: #fce4ec; 
            padding: 20px;
            border-radius: 10px;
        }

        table {
            margin-top: 20px;
            background-color: #000000; 
        }

        table th,
        table td {
            color: #fff;
            padding: 25px;
        }

        form button {
            background-color: #DF696E; 
            color: white; 
        }

        form button:hover {
            background-color: #D6656B; 
        }
    </style>
</head>

<body>
    <div>
        
        <h3>Menu</h3>

        <a href="cadastroFuncionario.php">
        Cadastrar Funcionario
        </a>

        <br>
        <a href="listaFuncionarios.php">
            Listar todos os funcionarios
        </a>
        <br>

        <hr>
        <a href="cadastroProduto.php">
            Cadastrar Produto
        </a>
       
        <br>
        <a href="produtos.php">
            Listar todos os produtos
        </a>
        <br>
    </div>
    

    <?php include_once "../components/footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
