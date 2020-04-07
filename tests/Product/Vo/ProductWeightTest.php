<?php


namespace App\Tests\Product\Vo;


use App\Domain\Product\Vo\ProductWeight;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ProductWeightTest extends TestCase
{
    public function testInitProductWeight()
    {
        $productWeight = new ProductWeight(35);
        $this->assertInstanceOf(ProductWeight::class, $productWeight);
        $this->assertEquals(35, $productWeight->value());
    }

    public function testExceptionProductWeight()
    {
        $this->expectException(InvalidArgumentException::class);
        $productWeight = new ProductWeight(0);
    }
}