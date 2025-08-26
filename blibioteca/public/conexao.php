<?php
$host = "localhost";
$user = "root";
$pass = "root";
$db = "biblioteca_db21";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>