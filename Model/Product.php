<?php

class Product
{
    protected float $price;
    private int $discount = 0;
    protected int $quantity;

    public function __construct($price, $quantity)
    {
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function setDiscount($title)
    {
        if ($title == 'Gunfight at Rio Bravo') {
            $this->discount = 20;
        }

        $discountedPrice = $this->price - ($this->price * $this->discount / 100);

        return [
            'original_price' => $this->price,
            'discounted_price' => $discountedPrice
        ];
    }
}

?>