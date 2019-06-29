<?php

namespace App\Service;

class Money
{
    protected $amount;
    protected $currency;

    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public function times(int $multiplier, string $currency): Money
    {
        return new Money($this->amount * $multiplier, $currency);
    }

    public function equals(Money $objectToEqual)
    {
        return $this->amount === $objectToEqual->amount
            && $this->currency() === $objectToEqual->currency();
    }

    public static function dollar(int $amount): Money
    {
        return new Money($amount, 'USD');
    }

    public static function franc(int $amount ): Money
    {
        return new Money($amount, 'CHF');
    }

    function currency(): string
    {
        return $this->currency;
    }

    public function plus(Money $addend): Money
    {
        return new Money($this->amount + $addend->amount, $this->currency);

    }
}