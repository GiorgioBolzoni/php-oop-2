<?php

trait DiscountTrait
{
    protected int $discount = 0;

    public function setDiscount($title)
    {
        if ($title == 'Zend Framework in Action') {
            $this->discount = 20;
        } else {
            $this->discount = 0;
        }
    }

    public function getDiscount()
    {
        return $this->discount;
    }
}

class Product
{
    use DiscountTrait;

    protected float $price;
    protected int $quantity;

    public function __construct($price, $quantity)
    {
        $this->price = $price;
        $this->quantity = $quantity;
    }
}
?>