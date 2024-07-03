<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
</head>
<body>

    <form action="../model/inserirProduto.php" method="POST" enctype="multipart/form-data">
    Descrição:<br>
    <input type="text" name="cxdescricao"/><br/>
    Preço:<br/>
    <input type="text" name="cxpreco"/><br/>
    Escolha uma imagem:
    <input type="file" name="cximagem" id="cximagem"><br><br>
    <button>Cadastrar</button>
    </form>    
</body>
</html>