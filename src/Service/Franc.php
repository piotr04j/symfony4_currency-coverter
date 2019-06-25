<?php

namespace App\Service;

class Franc extends Money
{

    public function __construct(int $amount, string $currency)
    {
        parent::__construct($amount, $currency);
    }

    public function times(int $multiplier): Money
    {
        return Money::franc($this->amount * $multiplier);
    }

    public function currency(): string
    {
        return $this->currency;
    }

}