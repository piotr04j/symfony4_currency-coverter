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
        $five->times(2);
        self::assertSame(10, $five->amount);
    }
}



