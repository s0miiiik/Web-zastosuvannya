<?php
require_once 'Product.php';

class Category {
    public $name;
    private $products = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function addProduct($product) {
        if ($product instanceof Product) {
            $this->products[] = $product;
        } else {
            throw new Exception("Об'єкт має бути типу Product.");
        }
    }

    public function getProducts() {
        $output = "Категорія: {$this->name}\n";
        foreach ($this->products as $product) {
            $output .= $product->getInfo() . "\n\n";
        }
        return $output;
    }
}
?>
