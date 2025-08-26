<?php
include "../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $ano = $_POST['ano_publicacao'];
    $autor = $_POST['id_autor'];

    if ($ano > 1500 && $ano <= date("Y")) {
        $sql = "INSERT INTO livros (titulo, genero, ano_publicacao, id_autor)
                VALUES ('$titulo','$genero','$ano','$autor')";
        if ($conn->query($sql) === TRUE) {
            echo "Livro cadastrado!";
        } else {
            echo "Erro: " . $conn->error;
        }
    } else {
        echo "O ano inválido!";
    }
}
?>

<form method="POST">
    Título: <input type="text" name="titulo"><br>
    Gênero: <input type="text" name="genero"><br>
    Ano Publicação: <input type="number" name="ano_publicacao"><br>
    Autor (ID): <input type="number" name="id_autor"><br>
    <button type="submit">Salvar</button>
</form>
