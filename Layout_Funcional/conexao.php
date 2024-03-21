<?php
$host = "localhost";
$username = "root"; // Usuário padrão do MySQL no XAMPP
$password = ""; // Senha padrão do MySQL no XAMPP
$dbname = "login_system"; // Altere para o nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>