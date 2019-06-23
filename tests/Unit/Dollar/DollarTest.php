<?php


namespace App\Tests\Unit\Dollar;


use App\Service\Dollar;
use PHPUnit\Framework\TestCase;


class DollarTest extends TestCase
{
    /**
     * @test
     */
    public function testDollarMultiplication()
    {
        $five = new Dollar(5);
        self::assertEquals(new Dollar(10), $five->times(2));
        self::assertEquals(new Dollar(50), $five->times(10));
    }

    /**
     * @test
     */
    public function testDollarEquals()
    {
        $dollar = new Dollar(7);
        self::assertTrue($dollar->equals(new Dollar(7)));
        self::assertFalse($dollar->equals(new Dollar(11)));
    }
}



