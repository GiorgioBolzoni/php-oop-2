<?php

class Product
{
    protected float $price;
    private int $discount = 0; // Modifica da sconto a discount
    protected int $quantity;

    public function __construct($price, $quantity)
    {
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function setDiscount($title)
    {
        // Aggiorna la logica dello sconto per calcolare il prezzo scontato
        if ($title == 'Gunfight at Rio Bravo') {
            $this->discount = 20;
        }

        // Calcola il prezzo scontato
        $discountedPrice = $this->price - ($this->price * $this->discount / 100);

        // Restituisci un array con il prezzo originale e scontato
        return [
            'original_price' => $this->price,
            'discounted_price' => $discountedPrice
        ];
    }
}

?>