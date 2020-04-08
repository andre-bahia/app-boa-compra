<?php


namespace App\Tests\Product\Vo\Domain;


use App\Domain\Product\Vo\ProductName;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ProductNameTest extends TestCase
{
    public function testInitProductName()
    {
        $productName = new ProductName('Fone de ouvido');
        $this->assertInstanceOf(ProductName::class, $productName);
        $this->assertEquals('Fone de ouvido', $productName->value());
    }

    public function testExceptionProductName()
    {
        $this->expectException(InvalidArgumentException::class);
        $productName = new ProductName('');
    }
}