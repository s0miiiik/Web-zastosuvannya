<?php
require_once 'Product.php';

class DiscountedProduct extends Product {
    public $discount;

    public function __construct($name, $price, $description, $discount) {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    public function getDiscountedPrice() {
        return $this->price - ($this->price * $this->discount / 100);
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function getInfo() {
        $discountedPrice = $this->getDiscountedPrice();
        return parent::getInfo() . "\nЗнижка: {$this->discount}%\nНова ціна: {$discountedPrice}";
    }
}
?>
