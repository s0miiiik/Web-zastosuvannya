<?php
class Product {
    public $name;
    public $description;
    protected $price;

    public function __construct($name, $price, $description) {
        $this->name = $name;
        $this->description = $description;
        $this->setPrice($price); // Використовуємо метод для валідації ціни
    }

    public function setPrice($price) {
        if ($price < 0) {
            throw new Exception("Ціна не може бути від'ємною.");
        }
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getInfo() {
        return "Назва: {$this->name}\nЦіна: {$this->price}\nОпис: {$this->description}";
    }
}
?>
