<?php
$servidor = "localhost";
$usuario = "root";
$senha = "root";
$banco = "padaria_paodango";

$conn = new mysqli($servidor, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>