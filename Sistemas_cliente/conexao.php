<?php

$servername = "localhost";
$username = "root";
$password = ""; // Deixe vazio se não houver senha para o usuário root
$dbname = "clientes_db";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

?>
