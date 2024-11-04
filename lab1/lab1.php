<?php
// Виведення на екран тексту "Hello, World!"
echo "Hello, World!";
?>

<?php
// Оголошення змінних різних типів
$stringVar = "Це рядок"; // рядок
$intVar = 42; // ціле число
$floatVar = 3.14; // число з плаваючою комою
$boolVar = true; // булеве значення

// Виведення значень змінних на екран
echo $stringVar;
echo "<br>";
echo $intVar;
echo "<br>";
echo $floatVar;
echo "<br>";
echo $boolVar ? "true" : "false"; // перетворення булевого значення на текст
echo "<br>";

// Виведення типу кожної змінної
var_dump($stringVar);
var_dump($intVar);
var_dump($floatVar);
var_dump($boolVar);
?>

<?php
echo "<br>";
// Оголошення двох рядкових змінних
$firstName = "Іван";
$lastName = "Петров";

// Об'єднання змінних у один рядок
$fullName = $firstName . " " . $lastName;
echo $fullName;
?>

<?php
echo "<br>";
// Оголошення змінної з числовим значенням
$number = 7;

// Перевірка, чи є число парним або непарним
if ($number % 2 == 0) {
    echo "Число парне";
} else {
    echo "Число непарне";
}
?>

<?php
echo "<br>";
// Виведення чисел від 1 до 10 за допомогою циклу for
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
echo "<br>";

// Виведення чисел від 10 до 1 за допомогою циклу while
$j = 10;
while ($j >= 1) {
    echo $j . " ";
    $j--;
}
?>

<?php
echo "<br>";
// Створення асоціативного масиву з інформацією про студента
$student = array(
    "ім'я" => "Олексій",
    "прізвище" => "Шевченко",
    "вік" => 21,
    "спеціальність" => "Інженерія"
);

// Виведення кожного елемента масиву
foreach ($student as $key => $value) {
    echo $key . ": " . $value . "<br>";
}

// Додавання нового елемента
$student["середній бал"] = 4.5;

// Виведення оновленого масиву
foreach ($student as $key => $value) {
    echo $key . ": " . $value . "<br>";
}
?>
