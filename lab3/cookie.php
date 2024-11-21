<?php
// Перевіряємо, чи була надіслана форма
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['name'])) {
        // Зберігаємо ім'я в cookie на 7 днів
        setcookie('username', $_POST['name'], time() + (7 * 24 * 60 * 60), "/");
        $_COOKIE['username'] = $_POST['name']; // Оновлюємо значення для поточного запиту
    }

    if (isset($_POST['delete_cookie'])) {
        // Видаляємо cookie, встановлюючи час життя в минуле
        setcookie('username', '', time() - 3600, "/");
        unset($_COOKIE['username']); // Видаляємо значення для поточного запиту
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Привітання</title>
</head>
<body>
<?php if (isset($_COOKIE['username'])): ?>
    <h1>Привіт, <?= htmlspecialchars($_COOKIE['username']) ?>!</h1>
    <form method="post">
        <button type="submit" name="delete_cookie">Видалити ім'я</button>
    </form>
<?php else: ?>
    <h1>Введіть своє ім'я</h1>
    <form method="post">
        <input type="text" name="name" placeholder="Ваше ім'я" required>
        <button type="submit">Зберегти</button>
    </form>
<?php endif; ?>
</body>
</html>
