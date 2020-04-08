<?php


namespace App\Tests\Company\Domain;


use App\Domain\Company\Company;
use App\Domain\Company\CompanyConfiguration;
use App\Domain\Company\Vo\CompanyFixedValue;
use App\Domain\Company\Vo\CompanyMaxWeight;
use App\Domain\Company\Vo\CompanyMinWeight;
use App\Domain\Company\Vo\CompanyName;
use App\Domain\Company\Vo\CompanyOnDemandValue;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase
{
    public function testInitCompany()
    {
        $transBoa = new Company();
        $transBoa->setName(new CompanyName('Transboa'));
        $transBoaConfig1 = new CompanyConfiguration();
        $transBoaConfig1->setFixedValue(new CompanyFixedValue(2.10));
        $transBoaConfig1->setOnDemandValue(new CompanyOnDemandValue(1.10));
        $transBoaConfig1->setMinWeight(new CompanyMinWeight(0));
        $transBoaConfig1->setMaxWeight(new CompanyMaxWeight(5));
        $transBoaConfig1->setCompany($transBoa);
        $this->assertInstanceOf(Company::class, $transBoa);
        $this->assertInstanceOf(CompanyConfiguration::class, $transBoaConfig1);
        $this->assertEquals('Transboa', $transBoa->getName()->value());
        $this->assertEquals(2.10, $transBoaConfig1->getFixedValue()->value());
        $this->assertEquals(1.10, $transBoaConfig1->getOnDemandValue()->value());
        $this->assertEquals(0, $transBoaConfig1->getMinWeight()->value());
    }

}