<?php

namespace App\Service;

class Money
{
    public $amount;
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

    public function plus(Bank $bank, Money $addend): Money
    {
        $amount = $this->amount + $bank->convertToCurrency($addend,$this->currency())->amount;
        return new Money($amount, $this->currency());

    }

    public function reduce(Bank $bank, string $to): Money
    {
        $rate = $bank->rate($this->currency, $to);
        return new Money($this->amount / $rate, $to);
    }

}