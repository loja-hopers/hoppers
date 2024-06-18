<?php
include_once '../components/header.php';
include_once '../factory/conexao.php';

session_start();

$idFuncionario = $_SESSION['id'];

//echo "<h1 class='center-align'>Consultando Funcionários</h1>";

// $dado = '%a%';

// $sql = "SELECT * FROM tabfuncionarios WHERE funNome LIKE '$dado' ORDER BY funNome";

// $consulta = $conn->prepare($sql);
// $consulta->execute();

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
            max-width: 150px; /* Ajuste conforme necessário */
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
            background-color: #DF696E; /* Cor do botão rosa mais escuro */
            color: white; /* Cor do texto branco */
        }

        form button:hover {
            background-color: #D6656B; /* Cor do botão rosa mais escura ao passar o mouse */
        }
    </style>
</head>

<body>
    <div>
        <?php
            echo "ID: ". $idFuncionario;
        ?>
        
        <h3>Funcionarios</h3>

        <div class='row'>
            <?php include_once '../model/listarFuncionarios.php'; ?>
        </div>

    </div>
    

    <?php include_once "../components/footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
