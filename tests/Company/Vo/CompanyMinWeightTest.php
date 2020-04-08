<?php


namespace App\Tests\Company\Vo;


use App\Domain\Company\Vo\CompanyFixedValue;
use App\Domain\Company\Vo\CompanyMinWeight;
use App\Domain\Product\Vo\ProductName;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CompanyMinWeightTest extends TestCase
{
    public function testInitCompanyMinWeight()
    {
        $minWeight = new CompanyMinWeight(55.54);
        $this->assertInstanceOf(CompanyMinWeight::class, $minWeight);
        $this->assertEquals(55.54, $minWeight->value());
    }

    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
        $minWeight = new CompanyMinWeight(-5);
    }
}