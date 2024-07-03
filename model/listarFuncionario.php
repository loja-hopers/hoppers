<?php
include_once "../factory/conexao.php";
include_once "../control/funcionario.php";


function mostrarDados($dados) {
    echo "<div class='col s12 m4'>";
    echo "<div class='card'>";
    echo "<div class='card-image'>";
    echo "<img src='../img/" . $dados['foto'] . "'><br>";
    echo "</div>";
    echo "<div class='card-content'>";
    echo "<p>{$dados['nome']}</p>";
    echo "</div>";
    echo "<div class='card-action'>";
    echo "<p class='preco'>{$dados['cargo']}</p>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}


$dados = new Funcionario;

$dados->setId($_POST["cxid"]);

$id = $dados->getId();


$listar = $conn->getConn()->prepare('SELECT * FROM funcionario where id = $id');
$listar->execute();

if($dados->getId() != ""){
    $conn = new Conexao;
    $query = "SELECT * FROM funcionario where id = '$id'";
    $listar = $conn->getConn()->prepare($query);
    $listar->execute();
    if ($listar) {
        mostrarDados([
            'nome' => $funcionario->getNome(),
            'email' => $funcionario->getEmail(),
            'cargo' => $funcionario->getCargo(),
            'foto' => $funcionario->getFoto()
        ]);
    } else {
     echo "<script>alert('Dado não encontado');</script>";
    }
}

?>
