<?php
require_once 'AccountInterface.php';

class BankAccount implements AccountInterface
{
    const MIN_BALANCE = 0;   // Мінімальний баланс

    protected $balance;
    protected $currency;

    public function __construct($currency)
    {
        $this->balance = 0;  // Початковий баланс
        $this->currency = $currency;
    }

    public function deposit($amount)
    {
        if ($amount <= 0) {
            throw new Exception("Сума для поповнення повинна бути більшою за нуль.");
        }
        $this->balance += $amount;
    }

    public function withdraw($amount)
    {
        if ($amount <= 0) {
            throw new Exception("Сума для зняття повинна бути більшою за нуль.");
        }
        if ($amount > $this->balance) {
            throw new Exception("Недостатньо коштів на рахунку.");
        }
        $this->balance -= $amount;
    }

    public function getBalance()
    {
        return $this->balance . ' ' . $this->currency;
    }
}
?>
