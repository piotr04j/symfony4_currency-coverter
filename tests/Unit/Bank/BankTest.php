<?php


namespace App\Tests\Unit\Bank;
use App\Service\Bank;
use App\Service\Money;


use PHPUnit\Framework\TestCase;

class BankTest extends TestCase
{
    /*
     * @test
     */
    public function testReduceMoney()
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1), 'USD');
        self::assertEquals(Money::dollar(1), $result);
    }

    /*
     * @test
     */
    public function testReduceMoneyDifferentCurrency()
    {
        $bank = new Bank();
        $bank->addRate('CHF','USD',2);
        $result = $bank->reduce(Money::franc(2),'CHF');
        self::assertEquals(Money::dollar(1),$result->reduce($bank, 'USD'));
    }

    public function testConvertToCurrency(){
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);

        $franc = $bank->convertToCurrency(Money::franc(6), 'USD');
        $dollar = $bank->convertToCurrency(Money::dollar(6), 'USD');
        $missingRate = $bank->convertToCurrency(Money::franc(6), 'EUR');

        self::assertEquals(Money::dollar(3)->amount, $franc->amount);
        self::assertEquals(Money::dollar(6)->amount, $dollar->amount);
        self::assertEquals(false, $missingRate->amount);
    }


}