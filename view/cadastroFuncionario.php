<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
</head>
<body>

    <form action="../model/inserirFuncionario.php" method="POST">
    Nome:<br>
    <input type="text" name="cxnome"/><br/>
    E-mail:<br/>
    <input type="text" name="cxemail"/><br/>
    Senha:<br/>
    <input type="text" name="cxsenha"/><br/>
    Cargo:<br/>
    <input type="text" name="cxcargo"/><br/>
    Foto:<br/>
    <input type="text" name="cxfoto"/><br/>
    <button>Cadastrar</button>
    </form>    


    <?php include_once "../component/footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>