<?php
require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

$output = ""; // Змінна для зберігання результатів операцій

try {
    // Створення банківського рахунку у доларах США
    $account1 = new BankAccount('USD');
    $account1->deposit(1500); // Поповнення на 1500 USD
    $output .= "Баланс рахунку 1 після поповнення: " . $account1->getBalance() . "<br>";

    // Попробуємо зняти 500 USD
    $account1->withdraw(500); // Зняття 500 USD
    $output .= "Баланс рахунку 1 після зняття: " . $account1->getBalance() . "<br>";

    // Невдала спроба зняти більше, ніж є на рахунку
    $account1->withdraw(2000);  // Тут виникне виняток
} catch (Exception $e) {
    $output .= "Помилка на рахунку 1: " . $e->getMessage() . "<br>";
}

try {
    // Створення банківського рахунку у євро
    $account2 = new BankAccount('EUR');
    $account2->deposit(1000); // Поповнення на 1000 EUR
    $output .= "Баланс рахунку 2 після поповнення: " . $account2->getBalance() . "<br>";

    // Невдала спроба зняти некоректну суму (негативну)
    $account2->withdraw(-200);  // Тут виникне виняток
} catch (Exception $e) {
    $output .= "Помилка на рахунку 2: " . $e->getMessage() . "<br>";
}

try {
    // Створення накопичувального рахунку у євро
    $savingsAccount1 = new SavingsAccount('EUR');
    $savingsAccount1->deposit(1000); // Поповнення на 1000 EUR
    $savingsAccount1->applyInterest(); // Нарахування відсотків
    $output .= "Баланс накопичувального рахунку 1 після нарахування відсотків: " . $savingsAccount1->getBalance() . "<br>";

    // Спроба зняти більше, ніж є на рахунку
    $savingsAccount1->withdraw(2000);  // Тут виникне виняток
} catch (Exception $e) {
    $output .= "Помилка на накопичувальному рахунку 1: " . $e->getMessage() . "<br>";
}

try {
    // Створення другого накопичувального рахунку
    $savingsAccount2 = new SavingsAccount('USD');
    $savingsAccount2->deposit(2000); // Поповнення на 2000 USD
    $savingsAccount2->applyInterest(); // Нарахування відсотків
    $output .= "Баланс накопичувального рахунку 2 після нарахування відсотків: " . $savingsAccount2->getBalance() . "<br>";

    // Спроба зняти негативну суму (некоректну операцію)
    $savingsAccount2->withdraw(-500);  // Тут виникне виняток
} catch (Exception $e) {
    $output .= "Помилка на накопичувальному рахунку 2: " . $e->getMessage() . "<br>";
}

// Виведення всіх результатів операцій
echo $output;
?>
