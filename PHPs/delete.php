<?php
include 'db.php';

$id = $_GET['id'];

$sql = "DELETE FROM produtos WHERE id_produto=$id";

if ($conn->query($sql) === TRUE) {
    echo "Produto excluído! <a href='read.php'>Voltar</a>";
} else {
    echo "Erro: " . $conn->error;
}
?>