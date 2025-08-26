<?php
// index.php - Menu inicial do sistema
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>📚 Sistema de Biblioteca</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
            text-align: center;
            padding: 50px;
        }
        h1 {
            color: #333;
        }
        .menu {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
            margin-top: 30px;
        }
        a {
            display: inline-block;
            padding: 12px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            width: 250px;
            text-align: center;
            transition: 0.3s;
        }
        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <h1>📚 Sistema de Gestão da Biblioteca</h1>
    <p>Escolha uma opção abaixo:</p>

    <div class="menu">
        <a href="autores/listar.php">👨‍💻 Gerenciar Autores</a>
        <a href="livros/listar.php">📖 Gerenciar Livros</a>
        <a href="leitores/listar.php">👤 Gerenciar Leitores</a>
        <a href="emprestimos/listar.php">📦 Gerenciar Empréstimos</a>
    </div>
</body>
</html>
