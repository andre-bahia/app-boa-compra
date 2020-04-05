<?php


namespace App\Domain\Company;


use App\Domain\Shared\Vo\Money;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

/**
 * @ORM\Embeddable()
 */
class CompanyOnDemandValue extends Money
{
    /**
     * @var float
     * @ORM\Column(name="on_demand_value", type="decimal", precision=20, scale=6)
     */
    protected $value;

    public function validate()
    {
        if (is_null($this->value) || empty($this->value)) {
            throw new InvalidArgumentException('On Demand value is required');
        }

        if ($this->value <= 0) {
            throw new InvalidArgumentException('On Demand must be greater than 0');
        }
    }
}