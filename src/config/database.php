<?php
$host = 'localhost';
$db = 'lamp_database';
$user = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8";

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexão com o banco de dados foi bem-sucedida!";
} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
?>
