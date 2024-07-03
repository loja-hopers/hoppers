<?php
include_once '../components/header.php';
include_once '../factory/conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Hoppers</title>
    
</head>

<body>
    <div class="container">
        <h3>Roupas disponíveis</h3>
        <hr>

        <div class='row'>
            <?php include_once '../model/listarProdutos.php'; ?>
        </div>
        
    </div>

    <?php include_once "../components/footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>
