<?php


namespace App\Tests\Unit\Money;


use App\Service\Bank;
use App\Service\Money;
use App\Service\Sum;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    /**
     * @test
     */
    public function testEquality()
    {
        $exampleFranc = Money::franc(5);
        self::assertTrue($exampleFranc->equals(Money::franc(5)));
        self::assertFalse($exampleFranc->equals(Money::franc(7)));

        $exampleDollar = Money::dollar(5);
        self::assertTrue($exampleDollar->equals(Money::dollar(5)));
        self::assertFalse($exampleDollar->equals(Money::dollar(7)));

        self::assertFalse($exampleDollar->equals(Money::franc(5)));
        self::assertFalse($exampleFranc->equals(Money::dollar(7)));
    }

    /**
     * @test
     */
    public function testMultiplication()
    {
        $fiveDollars = Money::dollar(5);
        self::assertEquals(Money::dollar(10), $fiveDollars->times(2, 'USD'));
        self::assertEquals(Money::dollar(50), $fiveDollars->times(10, 'USD'));

        $sevenFrancs = Money::franc(7);
        self::assertEquals(Money::franc(14), $sevenFrancs->times(2, 'CHF'));
        self::assertEquals(Money::franc(70), $sevenFrancs->times(10, 'CHF'));
    }

    /**
     * @test
     */
    public function testCurrency()
    {
        self::assertEquals('USD', Money::dollar(1)->currency());
        self::assertEquals('CHF', Money::franc(17)->currency());
    }

    /**
     * @test
     */
    public function testSimpleAddition()
    {
        $sum = new Sum(5,7);
        $bank = new Bank();
        $reduced = $bank->reduce($sum, 'USD');

        self::assertEquals(Money::dollar(12),$reduced);
    }

    /*
     * @ttest
     */
    public function testMixedAddition()
    {
        $bank = new Bank();
        $bank->addRate('CHF', 'USD', 2);
        $fiveDollars = Money::dollar(5);
        $result = $fiveDollars->plus($bank,Money::franc(22));
        self::assertEquals(16, $result->amount);
    }
}
