<?php
// Перевірка, чи файл завантажено
if (isset($_FILES['file']) && is_uploaded_file($_FILES['file']['tmp_name'])) {
    $file = $_FILES['file'];
    $uploadDir = 'uploads/';
    $allowedTypes = ['image/png', 'image/jpeg'];
    $maxSize = 2 * 1024 * 1024; // 2 MB

    // Перевірка типу файлу та розміру
    if (in_array($file['type'], $allowedTypes) && $file['size'] <= $maxSize) {
        $filename = basename($file['name']);
        $uploadPath = $uploadDir . $filename;

        // Перевірка, чи існує файл
        if (file_exists($uploadPath)) {
            $filename = time() . '_' . $filename;
            $uploadPath = $uploadDir . $filename;
        }

        // Завантаження файлу
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            echo "Файл успішно завантажено!<br>";
            echo "Ім'я файлу: $filename<br>";
            echo "Тип файлу: " . $file['type'] . "<br>";
            echo "Розмір файлу: " . round($file['size'] / 1024, 2) . " КБ<br>";
            echo "<a href='$uploadPath' download>Завантажити файл</a>";
        } else {
            echo "Помилка завантаження файлу.";
        }
    } else {
        echo "Недопустимий тип файлу або розмір перевищує 2 МБ.";
    }
} else {
    echo "Файл не було завантажено.";
}

// Виведення списку файлів у папці
echo "<h3>Список файлів у папці '$uploadDir':</h3>";

if (is_dir($uploadDir)) {
    $files = scandir($uploadDir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $filePath = $uploadDir . $file;
            if (is_file($filePath)) {
                echo "<a href='$filePath' download>$file</a><br>";
                
            }
        }
    }
} else {
    echo "Папка не знайдена.";
}
?>
