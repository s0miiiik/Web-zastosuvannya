<?php
session_start();
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: welcome.php");
        exit;
    } else {
        echo "Невірне ім'я користувача або пароль.";
    }
}
?>
<form method="POST" action="login.php">
    <input type="text" name="username" placeholder="Ім'я користувача" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <button type="submit">Увійти</button>
</form>
