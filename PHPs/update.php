<?php
include 'db.php';

$id = $_GET['id'];
$produto = $conn->query("SELECT * FROM produtos WHERE id_produto=$id")->fetch_assoc();
$categorias = $conn->query("SELECT * FROM categorias");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_produto = $_POST['nome_produto'];
    $preco = $_POST['preco_produto'];
    $quantidade = $_POST['quantidade_produto'];
    $categoria = $_POST['categoria_produto'];

    $sql = "UPDATE produtos SET 
            nome_produto='$nome_produto',
            preco_produto='$preco',
            quantidade_produto='$quantidade',
            id_categoria='$categoria'
            WHERE id_produto=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Produto atualizado! <a href='read.php'>Voltar</a>";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<form method="POST">
    Nome: <input type="text" name="nome_produto" value="<?php echo $produto['nome_produto']; ?>" required><br>
    Preço: <input type="number" step="0.01" name="preco_produto" value="<?php echo $produto['preco_produto']; ?>" required><br>
    Quantidade: <input type="number" name="quantidade_produto" value="<?php echo $produto['quantidade_produto']; ?>" required><br>
    Categoria: 
    <select name="categoria_produto" required>
        <?php while($cat = $categorias->fetch_assoc()) { ?>
            <option value="<?php echo $cat['id_categoria']; ?>" 
            <?php if($produto['id_categoria']==$cat['id_categoria']) echo 'selected'; ?>>
                <?php echo $cat['nome_categoria']; ?>
            </option>
        <?php } ?>
    </select><br>
    <button type="submit">Salvar</button>
</form>
