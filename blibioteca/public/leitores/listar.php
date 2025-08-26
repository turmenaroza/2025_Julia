<?php
include __DIR__ . "/../../config/conexao.php";

// Deletar leitor
if (isset($_GET['excluir'])) {
    $id_excluir = intval($_GET['excluir']);
    $conn->query("DELETE FROM leitores WHERE id_leitor = $id_excluir");
    header("Location: listar.php");
    exit;
}

// Listar todos os leitores
$result = $conn->query("SELECT * FROM leitores");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>👤 Lista de Leitores</title>
</head>
<body>
    <h1>👤 Lista de Leitores</h1>
    <a href="criar.php">+ Adicionar Leitor</a><br><br>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id_leitor'] ?></td>
            <td><?= htmlspecialchars($row['nome']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['telefone']) ?></td>
            <td>
                <a href="editar.php?id=<?= $row['id_leitor'] ?>">Editar</a> |
                <a href="listar.php?excluir=<?= $row['id_leitor'] ?>" onclick="return confirm('Tem certeza que quer excluir?')">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
