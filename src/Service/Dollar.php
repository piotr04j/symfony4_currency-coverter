<?php


namespace App\Service;


use phpDocumentor\Reflection\Types\Object_;

class Dollar
{
    private $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    public function times(int $multiplier)
    {
        return new Dollar($this->amount * $multiplier);
    }

    public function equals(Dollar $objectToEqual)
    {

        return $this->amount === $objectToEqual->amount;
    }
}