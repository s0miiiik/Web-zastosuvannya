<?php
session_start(); // Починаємо сесію

// Перевіряємо, чи є час останньої активності в сесії
if (isset($_SESSION['last_activity'])) {
    // Якщо користувач був неактивний більше 5 хвилин (300 секунд), завершуємо сесію
    if (time() - $_SESSION['last_activity'] > 300) {
        // Завершаємо сесію та очищаємо всі дані
        session_unset();
        session_destroy();
        header("Location: form.html"); // Перенаправляємо на стартову сторінку
        exit;
    }
}

// Оновлюємо час останньої активності
$_SESSION['last_activity'] = time();

// Додаємо товар до сесії
if (isset($_POST['product'])) {
    $product = $_POST['product'];

    // Перевіряємо, чи є вже корзина у сесії
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Додаємо товар до корзини
    $_SESSION['cart'][] = $product;

    // Збереження товарів у cookie (якщо це перший товар)
    if (!isset($_COOKIE['previous_purchases'])) {
        setcookie('previous_purchases', serialize([$product]), time() + (86400 * 30), "/"); // Зберігаємо на 30 днів
    } else {
        $previousPurchases = unserialize($_COOKIE['previous_purchases']);
        $previousPurchases[] = $product;
        setcookie('previous_purchases', serialize($previousPurchases), time() + (86400 * 30), "/");
    }
}

// Перенаправляємо користувача на сторінку кошика
header("Location: cart.php");
exit;
?>
