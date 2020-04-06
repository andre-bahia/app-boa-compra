<?php


namespace App\Tests\Product\Vo;


use App\Domain\Product\Vo\ProductName;
use PHPUnit\Framework\TestCase;

class ProductNameTest extends TestCase
{
    public function testInitProductName()
    {
        $productName = new ProductName('Fone de ouvido');
        $this->assertInstanceOf(ProductName::class, $productName);
        $this->assertEquals('Fone de ouvido', $productName->value());
    }
}