<?php
session_start();

// Дані для авторизації (логін та пароль)
$validUsername = "user";
$validPassword = "password";

// Обробка форми входу
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['logout'])) {
        // Очищення сесії при виході
        session_unset();
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }

    if (isset($_POST['username'], $_POST['password'])) {
        // Перевірка логіна та паролю
        if ($_POST['username'] === $validUsername && $_POST['password'] === $validPassword) {
            // Збереження інформації про користувача в сесії
            $_SESSION['user'] = $_POST['username'];
        } else {
            $error = "Невірний логін або пароль!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сторінка входу</title>
</head>
<body>
<?php if (isset($_SESSION['user'])): ?>
    <h1>Привіт, <?= htmlspecialchars($_SESSION['user']) ?>!</h1>
    <form method="post">
        <button type="submit" name="logout">Вихід</button>
    </form>
<?php else: ?>
    <h1>Вхід до системи</h1>
    <?php if (!empty($error)): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Логін" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Увійти</button>
    </form>
<?php endif; ?>
</body>
</html>
