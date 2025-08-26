<?php
include __DIR__ . "/../../config/conexao.php";

// Deletar autor
if (isset($_GET['excluir'])) {
    $id_excluir = intval($_GET['excluir']);
    $conn->query("DELETE FROM autores WHERE id_autor = $id_excluir");
    header("Location: listar.php");
    exit;
}

// Listar todos os autores
$result = $conn->query("SELECT * FROM autores");
?>

<?php
include __DIR__ . "/../../config/conexao.php";

// Deletar autor
if (isset($_GET['excluir'])) {
    $id_excluir = intval($_GET['excluir']);
    $conn->query("DELETE FROM autores WHERE id_autor = $id_excluir");
    header("Location: listar.php");
    exit;
}

// Listar todos os autores
$result = $conn->query("SELECT * FROM autores");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>👨‍💻 Lista de Autores</title>
</head>
<body>
    <h1>👨‍💻 Lista de Autores</h1>
    <a href="criar.php">+ Adicionar Autor</a><br><br>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Nacionalidade</th>
            <th>Ano Nascimento</th>
            <th>Ações</th>
        </tr>

        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id_autor'] ?></td>
            <td><?= htmlspecialchars($row['nome']) ?></td>
            <td><?= htmlspecialchars($row['nacionalidade']) ?></td>
            <td><?= $row['ano_nascimento'] ?></td>
            <td>
                <a href="editar.php?id=<?= $row['id_autor'] ?>">Editar</a> |
                <a href="listar.php?excluir=<?= $row['id_autor'] ?>" onclick="return confirm('Tem certeza que quer excluir?')">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

