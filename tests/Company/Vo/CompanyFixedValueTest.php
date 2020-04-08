<?php


namespace App\Tests\Company\Vo;


use App\Domain\Company\Vo\CompanyFixedValue;
use App\Domain\Product\Vo\ProductName;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CompanyFixedValueTest extends TestCase
{
    public function testInitCompanyFixedValue()
    {
        $fixedValue = new CompanyFixedValue(55.54);
        $this->assertInstanceOf(CompanyFixedValue::class, $fixedValue);
        $this->assertEquals(55.54, $fixedValue->value());
    }

    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
        $fixedValue = new CompanyFixedValue(-5);
    }
}