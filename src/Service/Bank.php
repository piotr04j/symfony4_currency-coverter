<?php


namespace App\Service;


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
}