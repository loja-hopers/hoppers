<?php
include_once 'cabecalho.php';
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Brant Culture</title>
    
<body id="fundo_menu">


    <a id="botao_menu" href="listaProdutos.php">Roupas 12/2023</a>
    <div class="imagem-container">
        <img id="foto_menu" src="imagens/fundo.jpg" alt="Imagem de Fundo">
    </div>


    <?php include_once "footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>