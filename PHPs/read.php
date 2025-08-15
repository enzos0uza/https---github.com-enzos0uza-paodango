<?php
include 'db.php';

$resultado = $conn->query("
    SELECT produtos.id_produto, produtos.nome_produto, produtos.preco_produto, produtos.quantidade_produto, categorias.nome_categoria
    FROM produtos 
    LEFT JOIN categorias ON produtos.id_categoria = categorias.id_categoria
");

echo "<h2>Lista de Produtos</h2>";
echo "<a href='create.php'>Cadastrar novo produto</a><br><br>";

while ($linha = $resultado->fetch_assoc()) {
    echo "ID: " . $linha['id_produto'] . " | ";
    echo "Nome: " . $linha['nome_produto'] . " | ";
    echo "Preço: R$ " . $linha['preco_produto'] . " | ";
    echo "Qtd: " . $linha['quantidade_produto'] . " | ";
    echo "Categoria: " . $linha['nome_categoria'] . " | ";
    echo "<a href='update.php?id=" . $linha['id_produto'] . "'>Editar</a> | ";
    echo "<a href='delete.php?id=" . $linha['id_produto'] . "'>Excluir</a><br>";
}
?>