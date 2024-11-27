<?php

interface AccountInterface
{
    public function deposit($amount);   // Метод для поповнення рахунку
    public function withdraw($amount);  // Метод для зняття коштів
    public function getBalance();       // Метод для отримання балансу
}
?>
