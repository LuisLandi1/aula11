<?php
session_start();
include('bd.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['idPessoa'])) {
  
}

// Processar o formulário de inserção de pessoa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomePessoa = $_POST['nome_pessoa'];
    $leito = $_POST['leito'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $prontuario = $_POST['prontuario'];

    // Verifica se os campos não estão vazios
    if (!empty($nomePessoa) && !empty($email)) {
        // Inserir a pessoa no banco de dados
        $sql = "INSERT INTO Pessoa (Nome, Leito, Email, Telefone, Prontuario) 
                VALUES ('$nomePessoa', '$leito', '$email', '$telefone', '$prontuario')";

        if ($conn->query($sql) === TRUE) {
            echo "Nova pessoa inserida com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Nome e Email são obrigatórios!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Pessoa</title>
</head>
<body>
    <h2>Inserir Nova Pessoa</h2>
    
    <form method="POST">
        <label for="nome_pessoa">Nome:</label><br>
        <input type="text" id="nome_pessoa" name="nome_pessoa" required><br><br>

        <label for="leito">Leito:</label><br>
        <input type="number" id="leito" name="leito"><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" id="telefone" name="telefone" required><br><br>

        <label for="prontuario">Prontuário:</label><br>
        <textarea id="prontuario" name="prontuario"></textarea><br><br>

        <input type="submit" value="Inserir Pessoa">
    </form>

    <br><a href="../login/login.php">Logout</a>
</body>
<img src="https://cdn.streamelements.com/uploads/2b46ad7f-1d1f-4c14-8978-b15a26b92a0b.gif" alt="">
</html>
