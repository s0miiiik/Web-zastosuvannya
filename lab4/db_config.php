<?php
// Параметри підключення до бази даних
$host = 'localhost';
$dbname = 'users_db';
$user = 'root'; // Замініть на вашого користувача MySQL
$password = ''; // Замініть на ваш пароль MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Помилка підключення до бази даних: " . $e->getMessage());
}
?>
