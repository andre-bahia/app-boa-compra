<?php


namespace App\Tests\Company\Vo\Domain;


use App\Domain\Company\Vo\CompanyFixedValue;
use App\Domain\Company\Vo\CompanyName;
use App\Domain\Product\Vo\ProductName;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CompanyNameTest extends TestCase
{
    public function testInitCompanyName()
    {
        $companyName = new CompanyName('BoaDex');
        $this->assertInstanceOf(CompanyName::class, $companyName);
        $this->assertEquals('BoaDex', $companyName->value());
    }

    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
        $companyName = new CompanyName('');
    }
}