<?php


namespace App\Tests\Company\Vo;


use App\Domain\Company\Vo\CompanyFixedValue;
use App\Domain\Company\Vo\CompanyOnDemandValue;
use App\Domain\Product\Vo\ProductName;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CompanyOnDemandValueTest extends TestCase
{
    public function testInitCompanyOnDemandValue()
    {
        $value = new CompanyOnDemandValue(20.33);
        $this->assertInstanceOf(CompanyOnDemandValue::class, $value);
        $this->assertEquals(20.33, $value->value());
    }

    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
        $value = new CompanyOnDemandValue(-5);
    }
}