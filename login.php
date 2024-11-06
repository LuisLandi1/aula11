<?php
session_start();
include('bd.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo_usuario = $_POST['tipo_usuario']; // Médico ou Enfermeiro

    // Consulta SQL para verificar se o usuário existe
    $sql = "SELECT * FROM Pessoa WHERE Email = '$email' AND Senha = '$senha'";  // Lembre-se de adicionar uma coluna 'Senha' na tabela Pessoa
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Se o usuário for encontrado, salvar os dados na sessão
        $row = $result->fetch_assoc();
        $_SESSION['idPessoa'] = $row['IdPessoa'];
        $_SESSION['nome'] = $row['Nome'];

        // Redireciona para a página de inserção do tipo de usuário
        if ($tipo_usuario == 'medico') {
            header("Location: ../inserir/inserir_medico.php");
        } else if ($tipo_usuario == 'infermeiro') {
            header("Location: ../inserir/inserir_infermeiro.php");
        }
        exit;
    } else {
        echo "Credenciais inválidas.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        <label for="tipo_usuario">Tipo de Usuário:</label>
        <select id="tipo_usuario" name="tipo_usuario" required>
            <option value="medico">Médico</option>
            <option value="infermeiro">Enfermeiro</option>
        </select><br><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
