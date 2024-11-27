<?php
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Перевірка унікальності користувача
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    $stmt->execute(['username' => $username, 'email' => $email]);
    if ($stmt->rowCount() > 0) {
        echo "Користувач із таким іменем або електронною поштою вже існує.";
    } else {
        // Вставка нового користувача
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        if ($stmt->execute(['username' => $username, 'email' => $email, 'password' => $password])) {
            echo "Реєстрація успішна! <a href='login.php'>Увійти</a>";
        } else {
            echo "Помилка під час реєстрації.";
        }
    }
}
?>
<form method="POST" action="register.php">
    <input type="text" name="username" placeholder="Ім'я користувача" required>
    <input type="email" name="email" placeholder="Електронна пошта" required>
    <input type="password" name="password" placeholder="Пароль" required>
    <button type="submit">Зареєструватися</button>
</form>
