<?php
require_once 'Product.php';
require_once 'DiscountedProduct.php';
require_once 'Category.php';

// Створення товарів
try {
    $product1 = new Product("Телефон", 12000, "Сучасний смартфон");
    $product2 = new Product("Ноутбук", 35000, "Ноутбук для роботи");
    $discountedProduct = new DiscountedProduct("Планшет", 15000, "Потужний планшет", 20);

    // Створення категорії
    $electronics = new Category("Електроніка");
    $electronics->addProduct($product1);
    $electronics->addProduct($product2);
    $electronics->addProduct($discountedProduct);

    // Отримання інформації
    $products = $electronics->getProducts();
} catch (Exception $e) {
    die("Помилка: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інтернет-магазин</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 300px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card h3 {
            margin: 10px;
            font-size: 20px;
            color: #333;
        }

        .card p {
            margin: 10px;
            color: #666;
        }

        .card .price {
            color: #4CAF50;
            font-size: 18px;
            font-weight: bold;
            margin: 10px;
        }

        .discount {
            color: #FF5722;
            font-size: 16px;
            font-weight: bold;
            margin: 10px;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Інтернет-магазин</h1>
    <p>Ласкаво просимо до нашого магазину електроніки!</p>
</div>

<div class="container">
    <?php
    // Виведення товарів
    echo "<!-- Відображення товарів -->";
    foreach ([$product1, $product2, $discountedProduct] as $product) {
        echo "<div class='card'>";
        echo "<h3>{$product->name}</h3>";
        echo "<p>{$product->description}</p>";
        echo "<p class='price'>Ціна: " . $product->getPrice() . " грн</p>";
        if ($product instanceof DiscountedProduct) {
            $discountedPrice = $product->getDiscountedPrice();
            echo "<p class='discount'>Знижка: {$product->discount}%</p>";
            echo "<p class='price'>Ціна зі знижкою: {$discountedPrice} грн</p>";
        }
        echo "</div>";
    }
    ?>
</div>

</body>
</html>
