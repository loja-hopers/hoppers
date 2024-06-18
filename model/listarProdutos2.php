<?php
include_once "../factory/conexao.php";
include_once "../control/produto.php";


function mostrarDados($dados) {
    echo "<div class='col s12 m4'>";
    echo "<div class='card'>";
    echo "<div class='card-image'>";
    echo "<img src='../img/{$dados['imagem']}.webp'><br>";
    echo "</div>";
    echo "<div class='card-content'>";
    echo "<p>{$dados['descricao']}</p>";
    echo "</div>";
    echo "<div class='card-action'>";
    echo "<p class='preco'>R$"."{$dados['preco']}</p>";
    echo "<td><a href='../view/editaProduto.php?id={$dados['id']}' class='btn-floating orange'><i class='material-icons'>edit</i></a></td>";
    echo "<td><a href='../view/removeProduto.php?id={$dados['id']}' class='btn-floating blue'><i class='material-icons'>delete</i></a></td></tr>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
}

$dados = new Produto;

$conn = new Conexao;

$listar = $conn->getConn()->prepare('SELECT * FROM produto');
$listar->execute();

$produtos = []; 

if ($listar->rowCount() > 0) {
    while ($linha = $listar->fetch(PDO::FETCH_ASSOC)) {
        $produto = new Produto;
        $produto->setDescricao($linha['descricao']);
        $produto->setPreco($linha['preco']);
        $produto->setImagem($linha['imagem']);
        $produtos[] = $produto; 
    }
    
    foreach ($produtos as $produto) {
        mostrarDados([
            'descricao' => $produto->getDescricao(),
            'preco' => $produto->getPreco(),
            'imagem' => $produto->getImagem()
        ]);
    }
} else {
    echo "Não há produtos!";
}

?>
