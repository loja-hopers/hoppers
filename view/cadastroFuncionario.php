<?php
include_once '../components/header.php';
include_once "../factory/conexao.php";

$conn = new Conexao;


// Função para obter os valores ENUM do campo 'cargo'
function getEnumValues($conexao, $table, $field) {
    $stmt = $conexao->query("SHOW COLUMNS FROM $table LIKE '$field'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    preg_match("/^enum\(\'(.*)\'\)$/", $row['Type'], $matches);
    $enum = explode("','", $matches[1]);
    return $enum;
}

$conexao = $conn->getConn();

// Obter os valores ENUM do campo 'cargo' da tabela 'funcionarios'
$cargos = getEnumValues($conexao, 'funcionario', 'cargo');

?>
<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <link rel="stylesheet" href="../css/estilos.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Cadastrar Funcionário</title>
</head>
<body>

    <div class="container">
    <form action="../model/inserirFuncionario.php" method="POST" enctype="multipart/form-data">
    Nome:<br>
    <input type="text" name="cxnome"><br/>
    E-mail:<br/>
    <input type="text" name="cxemail"/><br/>
    Senha:<br/>
    <input type="text" name="cxsenha"/><br/>
    Cargo:<br/>
    <select id="cargo" name="cxcargo" required>
        <?php
        foreach ($cargos as $cargo) {
            echo "<option value=\"$cargo\">$cargo</option>";
        }
        ?>
    </select>
    <br>
    Escolha uma imagem:
    <input type="file" name="cxfoto" id="cxfoto"><br><br>
    <button>Cadastrar</button>
    </form>    

    
    </div>
    <?php include_once "../components/footer.php"; ?>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>