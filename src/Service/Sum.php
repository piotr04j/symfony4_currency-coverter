<?php


namespace App\Service;


class Sum
{
    public $augend;
    public $addend;
    public $amount;

    public function __construct($augend, $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce(String $to): Money
    {

        $this->amount = $this->augend + $this->addend;
        return new Money($this->amount, $to);
    }
}