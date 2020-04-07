<?php


namespace App\Domain\Company\Vo;


use App\Domain\Shared\Vo\Money;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

/**
 * @ORM\Embeddable()
 */
class CompanyMaxWeight extends Money
{
    /**
     * @var float
     * @ORM\Column(name="max_weight", type="decimal", precision=10, scale=2)
     */
    protected float $value;

    public function validate()
    {
        if ($this->value < 0) {
            throw new InvalidArgumentException('Max weight value cannot be negative');
        }
    }
}