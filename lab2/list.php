<?php
$directory = 'uploads/';

if (is_dir($directory)) {
    $files = scandir($directory);
    echo "<h2>Список файлів у папці uploads:</h2>";
    echo "<ul>";

    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "<li><a href='$directory$file' download>$file</a></li>";
        }
    }
    echo "</ul>";
} else {
    echo "Папка uploads не існує.";
}
?>
