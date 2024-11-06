<?php
session_start();
include('bd.php');
if (!isset($_SESSION['idPessoa'])) {
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $receituario = $_POST['receituario'];
    $dataDemedicao = $_POST['data_demedicao'];
    $dataDosagem = $_POST['data_dosagem'];
    $codMedicamento = $_POST['cod_medicamento'];
    $codPessoa = $_SESSION['idPessoa'];

    $sql = "INSERT INTO Infermero (Receituario, DataDemedicao, DataDosagem, Cod_Medicamento, Cod_Pessoa)
            VALUES ('$receituario', '$dataDemedicao', '$dataDosagem', '$codMedicamento', '$codPessoa')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo registro criado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Receita - Enfermeiro</title>
</head>
<body>
    <h2>Inserir Receita - Enfermeiro</h2>
    <form method="POST">
        <label for="receituario">Receituário:</label><br>
        <textarea id="receituario" name="receituario" required></textarea><br><br>

        <label for="data_demedicao">Data da Medicação:</label><br>
        <input type="date" id="data_demedicao" name="data_demedicao" required><br><br>

        <label for="data_dosagem">Data de Dosagem:</label><br>
        <input type="datetime-local" id="data_dosagem" name="data_dosagem" required><br><br>

        <label for="cod_medicamento">Código do Medicamento:</label><br>
        <input type="number" id="cod_medicamento" name="cod_medicamento" required><br><br>

        <input type="submit" value="Inserir Receita">
    </form>

    <a href="../login/login.php">Logout</a>
</body>
<img src="errolobo.html"><img src="https://media.tenor.com/acIkaZGY2QMAAAAj/wolf-singing.gif" alt="">
</html>
