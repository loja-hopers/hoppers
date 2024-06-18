<?php
include_once "../factory/conexao.php";
include_once "../control/funcionario.php";


$dados = new Funcionario;

$conn = new Conexao;

$listar = $conn->getConn()->prepare('SELECT * FROM funcionario');
$listar->execute();

$funcionarios = []; 

if ($listar->rowCount() > 0) {
    while ($linha = $listar->fetch(PDO::FETCH_ASSOC)) {
        $funcionario = new Funcionario;
        $funcionario->setId($linha['id']);
        $funcionario->setNome($linha['nome']);
        $funcionario->setEmail($linha['email']);
        $funcionario->setSenha($linha['senha']);
        $funcionario->setCargo($linha['cargo']);
        $funcionario->setFoto($linha['foto']);
        $funcionarios[] = $funcionario; 
    }
    
    foreach ($funcionarios as $funcionario) {
        mostrarDados([
            'id' => $funcionario->getId(),
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
