<?php


namespace App\Tests\Company\Vo\Domain;


use App\Domain\Company\Vo\CompanyFixedValue;
use App\Domain\Company\Vo\CompanyMaxWeight;
use App\Domain\Company\Vo\CompanyMinWeight;
use App\Domain\Product\Vo\ProductName;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CompanyMaxWeightTest extends TestCase
{
    public function testInitCompanyMaxWeight()
    {
        $maxWeight = new CompanyMaxWeight(10);
        $this->assertInstanceOf(CompanyMaxWeight::class, $maxWeight);
        $this->assertEquals(10, $maxWeight->value());
    }

    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
        $maxWeight = new CompanyMaxWeight(-5);
    }
}