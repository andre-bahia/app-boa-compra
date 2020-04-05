<?php

namespace App\Domain;

use App\Domain\Company\Vo\CompanyFixedValue;
use App\Domain\Company\Vo\CompanyFixedValueExceedsWeight;
use App\Domain\Company\Vo\CompanyName;
use App\Domain\Company\Vo\CompanyOnDemandValue;
use App\Domain\Company\Vo\CompanyOnDemandValueExceedsWeight;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="companies")
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @var CompanyName
     * @ORM\Embedded(class="App\Domain\Company\Vo\CompanyName", columnPrefix=false)
     */
    private CompanyName $name;

    /**
     * @var CompanyFixedValue
     * @ORM\Embedded(class="App\Domain\Company\Vo\CompanyFixedValue", columnPrefix="false")
     */
    private CompanyFixedValue $fixedValue;

    /**
     * @var CompanyOnDemandValue
     * @ORM\Embedded(class="App\Domain\Company\Vo\CompanyOnDemandValue", columnPrefix="false")
     */
    private CompanyOnDemandValue $onDemandValue;

    /**
     * @var CompanyFixedValueExceedsWeight
     * @ORM\Embedded(class="App\Domain\Company\Vo\CompanyFixedValueExceedsWeight", columnPrefix="false")
     */
    private CompanyFixedValueExceedsWeight $fixedValueExceedsWeight;

    /**
     * @var CompanyOnDemandValueExceedsWeight
     * @ORM\Embedded(class="App\Domain\Company\Vo\CompanyOnDemandValueExceedsWeight", columnPrefix="false")
     */
    private CompanyOnDemandValueExceedsWeight $onDemandValueExceedsWeight;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return CompanyName
     */
    public function getName(): CompanyName
    {
        return $this->name;
    }

    /**
     * @param CompanyName $name
     */
    public function setName(CompanyName $name): void
    {
        $this->name = $name;
    }

    /**
     * @return CompanyFixedValue
     */
    public function getFixedValue(): CompanyFixedValue
    {
        return $this->fixedValue;
    }

    /**
     * @param CompanyFixedValue $fixedValue
     */
    public function setFixedValue(CompanyFixedValue $fixedValue): void
    {
        $this->fixedValue = $fixedValue;
    }

    /**
     * @return CompanyOnDemandValue
     */
    public function getOnDemandValue(): CompanyOnDemandValue
    {
        return $this->onDemandValue;
    }

    /**
     * @param CompanyOnDemandValue $onDemandValue
     */
    public function setOnDemandValue(CompanyOnDemandValue $onDemandValue): void
    {
        $this->onDemandValue = $onDemandValue;
    }

    /**
     * @return CompanyFixedValueExceedsWeight
     */
    public function getFixedValueExceedsWeight(): CompanyFixedValueExceedsWeight
    {
        return $this->fixedValueExceedsWeight;
    }

    /**
     * @param CompanyFixedValueExceedsWeight $fixedValueExceedsWeight
     */
    public function setFixedValueExceedsWeight(CompanyFixedValueExceedsWeight $fixedValueExceedsWeight): void
    {
        $this->fixedValueExceedsWeight = $fixedValueExceedsWeight;
    }

    /**
     * @return CompanyOnDemandValueExceedsWeight
     */
    public function getOnDemandValueExceedsWeight(): CompanyOnDemandValueExceedsWeight
    {
        return $this->onDemandValueExceedsWeight;
    }

    /**
     * @param CompanyOnDemandValueExceedsWeight $onDemandValueExceedsWeight
     */
    public function setOnDemandValueExceedsWeight(CompanyOnDemandValueExceedsWeight $onDemandValueExceedsWeight): void
    {
        $this->onDemandValueExceedsWeight = $onDemandValueExceedsWeight;
    }
}