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

// Виводимо поточну корзину покупок
echo "<h1>Корзина покупок</h1>";
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<ul>";
    foreach ($_SESSION['cart'] as $item) {
        echo "<li>$item</li>";
    }
    echo "</ul>";
} else {
    echo "<p>Ваша корзина порожня.</p>";
}

// Переглянути попередні покупки з cookie
if (isset($_COOKIE['previous_purchases'])) {
    $previousPurchases = unserialize($_COOKIE['previous_purchases']);
    echo "<h2>Попередні покупки</h2>";
    echo "<ul>";
    foreach ($previousPurchases as $item) {
        echo "<li>$item</li>";
    }
    echo "</ul>";
} else {
    echo "<p>У вас немає попередніх покупок.</p>";
}
?>
