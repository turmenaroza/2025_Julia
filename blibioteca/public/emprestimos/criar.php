<?php
include "../config/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_livro = $_POST['id_livro'];
    $id_leitor = $_POST['id_leitor'];
    $data_emprestimo = $_POST['data_emprestimo'];
    $data_devolucao = $_POST['data_devolucao'] ?: NULL;

  
    $livroAtivo = $conn->query("SELECT * FROM emprestimos WHERE id_livro=$id_livro AND data_devolucao IS NULL");
    if ($livroAtivo->num_rows > 0) {
        die("Este livro já está emprestado!");
    }

   
    $emprestimosAtivos = $conn->query("SELECT COUNT(*) AS total FROM emprestimos WHERE id_leitor=$id_leitor AND data_devolucao IS NULL")->fetch_assoc();
    if ($emprestimosAtivos["total"] >= 3) {
        die("Este usuário já possui 3 empréstimos !");
    }

    
    if ($data_devolucao && $data_devolucao < $data_emprestimo) {
        die("Data de devolução inválida!");
    }

    $sql = "INSERT INTO emprestimos (id_livro, id_leitor, data_emprestimo, data_devolucao)
            VALUES ('$id_livro','$id_leitor','$data_emprestimo', " . ($data_devolucao ? "'$data_devolucao'" : "NULL") . ")";
    
    if ($conn->query($sql) === TRUE) {
        echo "Empréstimo registrado!";
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<form method="POST">
    Livro (ID): <input type="number" name="id_livro"><br>
    Leitor (ID): <input type="number" name="id_leitor"><br>
    Data Empréstimo: <input type="date" name="data_emprestimo"><br>
    Data Devolução: <input type="date" name="data_devolucao"><br>
    <button type="submit">Salvar</button>
</form>