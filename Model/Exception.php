<?php

class QuantityOutOfRangeException extends Exception
{
    public function __construct($message = "Quantity out of range", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
?>