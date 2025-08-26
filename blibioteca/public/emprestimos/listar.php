<?php
include __DIR__ . "/../../config/conexao.php";


if (isset($_GET['excluir'])) {
    $id_excluir = intval($_GET['excluir']);
    $conn->query("DELETE FROM emprestimos WHERE id_emprestimos = $id_excluir");
    header("Location: listar.php");
    exit;
}


if (isset($_GET['devolver'])) {
    $id_emprestimo = intval($_GET['devolver']);
    $hoje = date('Y-m-d');
    $conn->query("UPDATE emprestimos SET data_devolucao = '$hoje' WHERE id_emprestimos = $id_emprestimo");
    header("Location: listar.php");
    exit;
}


$ativos = $conn->query("
    SELECT e.id_emprestimos, l.titulo AS livro, le.nome AS leitor, e.data_emprestimos, e.data_devolucao
    FROM emprestimos e
    JOIN livros l ON e.id_livro = l.id_livro
    JOIN leitores le ON e.id_leitor = le.id_leitor
    WHERE e.data_devolucao IS NULL
");


$concluidos = $conn->query("
    SELECT e.id_emprestimos, l.titulo AS livro, le.nome AS leitor, e.data_emprestimos, e.data_devolucao
    FROM emprestimos e
    JOIN livros l ON e.id_livro = l.id_livro
    JOIN leitores le ON e.id_leitor = le.id_leitor
    WHERE e.data_devolucao IS NOT NULL
");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>📦 Lista de Empréstimos</title>
</head>
<body>
    <h1>📦 Empréstimos Ativos</h1>
    <a href="criar.php">+ Registrar Empréstimo</a><br><br>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Livro</th>
            <th>Leitor</th>
            <th>Data Empréstimo</th>
            <th>Ações</th>
        </tr>
        <?php while($row = $ativos->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id_emprestimos'] ?></td>
            <td><?= htmlspecialchars($row['livro']) ?></td>
            <td><?= htmlspecialchars($row['leitor']) ?></td>
            <td><?= $row['data_emprestimos'] ?></td>
            <td>
                <a href="listar.php?devolver=<?= $row['id_emprestimos'] ?>">Devolver</a> |
                <a href="editar.php?id=<?= $row['id_emprestimos'] ?>">Editar</a> |
                <a href="listar.php?excluir=<?= $row['id_emprestimos'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h1>📦 Empréstimos Concluídos</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Livro</th>
            <th>Leitor</th>
            <th>Data Empréstimo</th>
            <th>Data Devolução</th>
            <th>Ações</th>
        </tr>
        <?php while($row = $concluidos->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id_emprestimos'] ?></td>
            <td><?= htmlspecialchars($row['livro']) ?></td>
            <td><?= htmlspecialchars($row['leitor']) ?></td>
            <td><?= $row['data_emprestimos'] ?></td>
            <td><?= $row['data_devolucao'] ?></td>
            <td>
                <a href="editar.php?id=<?= $row['id_emprestimos'] ?>">Editar</a> |
                <a href="listar.php?excluir=<?= $row['id_emprestimos'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
