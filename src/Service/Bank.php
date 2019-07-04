<?php


namespace App\Service;


use phpDocumentor\Reflection\Types\Object_;

class Bank
{
    private $rates;

    public function __construct()
    {
        $this->rates = [];
    }

    public function reduce($source, string $to): Money
    {
        if($source instanceof Money)
        {
            return $source;
        }
        if($source instanceof Sum)
        {
            return $source->reduce($to);
        }
    }

    public function addRate(string $from, string $to, int $rate): void
    {
        $this->rates[$from] = [ $to => $rate];
    }

    public function rate(string $from ,string $to ): int
    {
        if ($from === $to) return 1;
        return  $this->rates[$from][$to];
    }

    public function convertToCurrency(Money $from, string $to): Money {
        if($from->currency() === $to) return new Money($from->amount, $to);
        if  (
                array_key_exists($from->currency(), $this->rates) &&
                array_key_exists($to, $this->rates[$from->currency()])
            ){
            return new Money($from->amount / $this->rates[$from->currency()][$to], $to);
        }

        return new Money(false, $to);

    }
}