<?php
if (isset($_POST['text'])) {
    $text = $_POST['text'];
    $logFile = 'log.txt';

    // Запис тексту у файл
    file_put_contents($logFile, $text . PHP_EOL, FILE_APPEND);
    echo "Текст записано у файл.<br>";
}

// Відображення вмісту файлу
if (file_exists($logFile)) {
    echo "<h3>Вміст файлу log.txt:</h3>";
    echo nl2br(file_get_contents($logFile));
} else {
    echo "Файл log.txt ще не створений.";
}
?>
