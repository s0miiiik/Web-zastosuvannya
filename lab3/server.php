<?php
// Перевірка методу запиту
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Якщо метод не POST, перенаправити на іншу сторінку
    header("Location: previous_purchases.php");
    exit(); // Завершити виконання скрипта після перенаправлення
}

// Виведення інформації
echo "<h3>Інформація про сервер та запит:</h3>";
echo "IP-адреса клієнта: " . $_SERVER['REMOTE_ADDR'] . "<br>";
echo "Назва та версія браузера: " . $_SERVER['HTTP_USER_AGENT'] . "<br>";
echo "Назва скрипта, що виконується: " . $_SERVER['PHP_SELF'] . "<br>";
echo "Метод запиту: " . $_SERVER['REQUEST_METHOD'] . "<br>";
echo "Шлях до файлу на сервері: " . $_SERVER['SCRIPT_FILENAME'] . "<br>";
?>
