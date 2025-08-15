<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_produto = $_POST['nome_produto'];
    $preco_produto = $_POST['preco_produto'];
    $quantidade_produto = $_POST['quantidade_produto'];
    $categoria_produto = $_POST['categoria'];

    $sql = "INSERT INTO produtos (nome_produto, preco_produto, quantidade_produto, id_categoria) 
            VALUES ('$nome_produto', '$preco_produto', '$quantidade_produto', '$categoria_produto')";

    if ($conn->query($sql) === TRUE) {
        echo "Produto cadastrado com sucesso! <a href='read.php'>Ver produtos</a>";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$categorias = $conn->query("SELECT * FROM categorias");
?>

<form method="POST">
    Nome: <input type="text" name="nome_produto" required><br>
    Preço: <input type="number" step="0.01" name="preco_produto" required><br>
    Quantidade: <input type="number" name="quantidade_produto" required><br>
    Categoria: 
    <select name="categoria" required>
        <?php while($cat = $categorias->fetch_assoc()) { ?>
            <option value="<?php echo $cat['id_categoria']; ?>"><?php echo $cat['nome_categoria']; ?></option>
        <?php } ?>
    </select><br>
    <button type="submit">Cadastrar</button>
</form>
