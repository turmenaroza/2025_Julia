<?php
include __DIR__ . "/../../config/conexao.php";


$filtro_genero = $_GET['genero'] ?? '';
$filtro_autor = $_GET['autor'] ?? '';
$filtro_ano = $_GET['ano'] ?? '';


$sql = "SELECT livros.id_livro, livros.titulo, livros.genero, livros.ano_publicacao, autores.nome AS autor
        FROM livros
        INNER JOIN autores ON livros.id_autor = autores.id_autor
        WHERE 1=1";

if ($filtro_genero) {
    $sql .= " AND livros.genero LIKE '%$filtro_genero%'";
}
if ($filtro_autor) {
    $sql .= " AND autores.nome LIKE '%$filtro_autor%'";
}
if ($filtro_ano) {
    $sql .= " AND livros.ano_publicacao = '$filtro_ano'";
}

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>📖 Lista de Livros</title>
</head>
<body>
    <h1>📖 Lista de Livros</h1>
    <a href="criar.php">+ Adicionar Livro</a><br><br>

    <form method="GET">
        Filtro: 
        Gênero: <input type="text" name="genero" value="<?= htmlspecialchars($filtro_genero) ?>">
        Autor: <input type="text" name="autor" value="<?= htmlspecialchars($filtro_autor) ?>">
        Ano: <input type="number" name="ano" value="<?= htmlspecialchars($filtro_ano) ?>">
        <button type="submit">Filtrar</button>
    </form>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Gênero</th>
            <th>Ano</th>
            <th>Autor</th>
            <th>Ações</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id_livro'] ?></td>
            <td><?= htmlspecialchars($row['titulo']) ?></td>
            <td><?= htmlspecialchars($row['genero']) ?></td>
            <td><?= $row['ano_publicacao'] ?></td>
            <td><?= htmlspecialchars($row['autor']) ?></td>
            <td>
                <a href="editar.php?id=<?= $row['id_livro'] ?>">Editar</a> |
                <a href="excluir.php?id=<?= $row['id_livro'] ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
