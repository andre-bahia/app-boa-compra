<?php


namespace App\Domain\Company;

use App\Domain\Company\Vo\CompanyFixedValue;
use App\Domain\Company\Vo\CompanyMaxWeight;
use App\Domain\Company\Vo\CompanyMinWeight;
use App\Domain\Company\Vo\CompanyOnDemandValue;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="company_configurations")
 */
class CompanyConfiguration
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected int $id;

    /**
     * @var CompanyMinWeight
     * @ORM\Embedded(class="App\Domain\Company\Vo\CompanyMinWeight", columnPrefix=false)
     */
    protected CompanyMinWeight $minWeight;

    /**
     * @var CompanyMaxWeight
     * @ORM\Embedded(class="App\Domain\Company\Vo\CompanyMaxWeight", columnPrefix=false)
     */
    protected CompanyMaxWeight $maxWeight;

    /**
     * @var CompanyFixedValue
     * @ORM\Embedded(class="App\Domain\Company\Vo\CompanyFixedValue", columnPrefix=false)
     */
    protected CompanyFixedValue $fixedValue;

    /**
     * @var CompanyOnDemandValue
     * @ORM\Embedded(class="App\Domain\Company\Vo\CompanyOnDemandValue", columnPrefix=false)
     */
    protected CompanyOnDemandValue $onDemandValue;

    /**
     * @ORM\ManyToOne(targetEntity="Company")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    protected Company $company;

    /**
     * @return CompanyMinWeight
     */
    public function getMinWeight(): CompanyMinWeight
    {
        return $this->minWeight;
    }

    /**
     * @param CompanyMinWeight $minWeight
     */
    public function setMinWeight(CompanyMinWeight $minWeight): void
    {
        $this->minWeight = $minWeight;
    }

    /**
     * @return CompanyMaxWeight
     */
    public function getMaxWeight(): CompanyMaxWeight
    {
        return $this->maxWeight;
    }

    /**
     * @param CompanyMaxWeight $maxWeight
     */
    public function setMaxWeight(CompanyMaxWeight $maxWeight): void
    {
        $this->maxWeight = $maxWeight;
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
     * @return Company
     */
    public function getCompany(): Company
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company): void
    {
        $this->company = $company;
    }
}