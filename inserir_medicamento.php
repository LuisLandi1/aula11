<?php
session_start();
include('bd.php');


if (!isset($_SESSION['idPessoa'])) {

}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeMedicamento = $_POST['nome_medicamento'];

    
    if (!empty($nomeMedicamento)) {
     
        $sql = "INSERT INTO Medicamento (Nome) VALUES ('$nomeMedicamento')";

        if ($conn->query($sql) === TRUE) {
            echo "Novo medicamento inserido com sucesso!";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "O nome do medicamento não pode ser vazio.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Medicamento</title>
</head>
<body>
    <h2>Inserir Novo Medicamento</h2>
    
    <form method="POST">
        <label for="nome_medicamento">Nome do Medicamento:</label><br>
        <input type="text" id="nome_medicamento" name="nome_medicamento" required><br><br>
        
        <input type="submit" value="Inserir Medicamento">
    </form>

    <br><a href="../login/login.php">Logout</a>
</body>
<img src="https://img1.picmix.com/output/stamp/normal/6/7/8/8/2358876_0dff0.gif" alt="">
</html>
