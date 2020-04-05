<?php


namespace App\Domain\Company\Vo;

use App\Domain\Shared\Vo\Money;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

/**
 * @ORM\Embeddable()
 */
class CompanyOnDemandValueExceedsWeight extends Money
{
    /**
     * @var float
     * @ORM\Column(name="on_demand_value_exceeds_weight", type="decimal", precision=20, scale=6, nullable=true)
     */
    protected float $value;

    public function validate()
    {
       return true;
    }
}