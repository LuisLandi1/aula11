<?php
session_start();
include('bd.php');

if (!isset($_SESSION['IdReceita '])) {

}

$sql = "SELECT r.IdReceita, r.Descricao, p.Nome AS NomePessoa, m.Nome AS NomeMedico, i.Nome AS NomeInfermeiro, me.Nome AS NomeMedicamento
        FROM Receitas r
        JOIN Pessoa p ON r.cod_pessoa = p.IdPessoa
        JOIN Medico m ON r.cod_medico = m.IdMedico
        JOIN Infermero i ON r.cod_infermeiro = i.IdInfermero
        JOIN Medicamento me ON r.cod_medicamento = me.IdMedicamento";

$result = $conn->query($sql);

if (!$result) {
    echo "Erro na consulta SQL: " . $conn->error . "<br>";
echo "Consulta SQL: " . $sql;
die();

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Receitas</title>
</head>
<body>
    <h2>Lista de Receitas</h2>
    
    <?php if ($result->num_rows > 0): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID Receita</th>
                    <th>Descrição</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Enfermeiro</th>
                    <th>Medicamento</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['IdReceita']); ?></td>
                        <td><?php echo htmlspecialchars($row['Descricao']); ?></td>
                        <td><?php echo htmlspecialchars($row['NomePessoa']); ?></td>
                        <td><?php echo htmlspecialchars($row['NomeMedico']); ?></td>
                        <td><?php echo htmlspecialchars($row['NomeInfermeiro']); ?></td>
                        <td><?php echo htmlspecialchars($row['NomeMedicamento']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Não há receitas cadastradas.</p>
    <?php endif; ?>

 
</body>
</html>
