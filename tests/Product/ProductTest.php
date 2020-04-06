<?php


namespace App\Tests\Product;


use App\Domain\Product\Product;
use App\Domain\Product\Vo\ProductName;
use App\Domain\Product\Vo\ProductWeight;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testInstanceProduct()
    {
        $product = new Product();
        $product->setName(new ProductName('Pc Gamer'));
        $product->setWeight(new ProductWeight(35));
        $this->assertInstanceOf(Product::class, $product);
        $this->assertEquals('Pc Gamer', $product->getName()->value());
        $this->assertEquals(35, $product->getWeight()->getWeight());
    }
}