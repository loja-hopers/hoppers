<?php
require_once('conexao.php');

// Array de produtos a serem inseridos
$produtos = array(
    array('Camisa Class Reverse', 'classpreta', 199.99),
    array('Camisa High', 'camisetahigh', 129.99),
    array('Camisa Mad Enlatados Verde', 'madverde', 189.99),
    array('Camisa Class Azul', 'classazul', 199.99),
    array('Camisa Class Verde', 'classverde', 199.99),
    array('Calça Prive', 'calcaprive', 399.99),
    array('Camisa Prive', 'camisetaprive', 139.99),
    array('Calça Sufgang', 'calcasuf', 379.99),
    array('Camisa Mad', 'madpolo', 169.99)
);

// Inserir produtos na tabela
foreach ($produtos as $produto) {
    $descricao = $produto[0];
    $imagem = $produto[1];
    $preco = $produto[2];

    $sql = "INSERT INTO tabprodutos (proDescricao, proImagem, proPreco) VALUES ('$descricao', '$imagem', $preco)";

    if ($conn->query($sql) !== TRUE) {
        echo "Erro ao inserir produto: " . $conn->error;
    }
}

// conexão
$conn->c/ Fecharlose();

echo "Produtos inseridos com sucesso!";
?>
