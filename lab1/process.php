<?php
// Перевірка, чи отримані дані коректно
if (isset($_POST["firstName"]) && isset($_POST["lastName"]) &&
    !empty($_POST["firstName"]) && !empty($_POST["lastName"])) {

    // Отримання даних з форми
    $firstName = htmlspecialchars($_POST["firstName"]);
    $lastName = htmlspecialchars($_POST["lastName"]);

    // Виведення привітання
    echo "Привіт, " . $firstName . " " . $lastName . "!";
} else {
    echo "Будь ласка, заповніть усі поля.";
}
?>
