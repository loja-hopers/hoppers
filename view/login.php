<?php
include_once '../components/header.php';
include_once '../factory/conexao.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica as credenciais
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tabfuncionarios WHERE funUsuario = :usuario AND funSenha = :senha";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $stmt->execute();

    // Se as credenciais estiverem corretas, redireciona para a página principal
    if ($stmt->rowCount() > 0) {
        header('Location: listafuncionarios.php');
        exit;
    } else {
        $mensagemErro = "Credenciais inválidas. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Login</title>
    <style>
        h3{
            color: black;
        }

        body {
            background-color: #ffffff; /* Cor de fundo rosa claro */
        }

        .card {
            width: 30vw;
            margin: 50px auto;
            text-align: center;
            background-color: #ffffff; /* Cor do card branco  */
            padding: 20px;
            border-radius: 10px;
        }

        .card-content {
            padding-top: 20px;
        }

        .btn {
            background-color: #ffffff; /* Cor do botão branco */
            color: black
        }

        .btn:hover {
            background-color: #000000; /* Cor do botão preto ao passar o mouse */
            color: white 
        }

        .mensagem-erro {
            color: red;
        }

        .register {
            box-shadow: 1px 2px 6px #0000007d !important;
            margin: auto;
            display: inline-block;
            border: none;
            border-radius: 3px;
            line-height: 36px;
            padding: 2px;
            color: black;
            text-align: center;
            background-color: #ffffff;
            text-transform: uppercase;
        }

        .register:hover {
            background-color: #000000;
            color: #ffffff
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="cad" class="card">
            <h3>Login</h3>
            <?php
            if (isset($mensagemErro)) {
                echo "<p class='mensagem-erro'>$mensagemErro</p>";
            }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="input-field">
                    <input type="text" id="usuario" name="usuario" required>
                    <label for="usuario">Usuário</label>
                </div>
                <div class="input-field">
                    <input type="password" id="senha" name="senha" required>
                    <label for="senha">Senha</label>
                </div>
                <button type="submit" class="btn">Entrar</button>
            </form>

            <a href="insereFuncionario.php" class="register">Registre-se!</a>
        </div>
    </div>

    <?php include_once "../components/footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'>

    $(document).ready(function() {
    M.updateTextFields();
    });</script>

</body>

</html>