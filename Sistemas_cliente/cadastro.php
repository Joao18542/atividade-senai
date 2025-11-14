<?php
include 'conexao.php';

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];

    // Validar e sanitizar os dados (exemplo básico)
    $nome = $conn->real_escape_string($nome);
    $email = $conn->real_escape_string($email);
    $telefone = $conn->real_escape_string($telefone);

    $sql = "INSERT INTO clientes (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";

    if ($conn->query($sql) === TRUE) {
        $mensagem = "<div style='color: green;'>Cliente cadastrado com sucesso!</div>";
    } else {
        $mensagem = "<div style='color: red;'>Erro ao cadastrar cliente: " . $conn->error . "</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 600px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        label { display: block; margin-bottom: 5px; }
        input[type="text"], input[type="email"] { width: 100%; padding: 8px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
        .message { margin-top: 15px; padding: 10px; border-radius: 4px; }
        .message div { margin-bottom: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Cadastro de Clientes</h2>
        <?php echo $mensagem; ?>
        <form action="cadastro.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone">

            <input type="submit" value="Cadastrar Cliente">
        </form>
        <p><a href="listar.php">Ver Clientes Cadastrados</a></p>
    </div>
</body>
</html>
