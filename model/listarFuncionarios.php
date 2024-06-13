<?php
include_once "../factory/conexao.php";
include_once "../control/funcionario.php";


function mostrarDados($dados) {
    echo "<div class='col s12 m4'>";
    echo "<div class='card'>";
    echo "<div class='card-image'>";
    echo "<img src='../img/{$dados['foto']}.webp'><br>";
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

$conn = new Conexao;

$listar = $conn->getConn()->prepare('SELECT * FROM funcionario');
$listar->execute();

$funcionarios = []; 

if ($listar->rowCount() > 0) {
    while ($linha = $listar->fetch(PDO::FETCH_ASSOC)) {
        $funcionario = new Funcionario;
        $funcionario->setNome($linha['nome']);
        $funcionario->setEmail($linha['email']);
        $funcionario->setSenha($linha['senha']);
        $funcionario->setCargo($linha['cargo']);
        $funcionario->setFoto($linha['foto']);
        $funcionarios[] = $funcionario; 
    }
    
    foreach ($funcionarios as $funcionario) {
        mostrarDados([
            'nome' => $funcionario->getNome(),
            'email' => $funcionario->getEmail(),
            'cargo' => $funcionario->getCargo(),
            'foto' => $funcionario->getFoto()
        ]);
    }
} else {
    echo "Não há funcionários!";
}

?>
