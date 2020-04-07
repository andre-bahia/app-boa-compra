<?php


namespace App\Domain\Company\Vo;


use App\Domain\Shared\Vo\Money;
use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

/**
 * @ORM\Embeddable()
 */
class CompanyMinWeight extends Money
{
    /**
     * @var float
     * @ORM\Column(name="min_weight", type="decimal", precision=5, scale=2)
     */
    protected float $value;

    public function validate()
    {
        if ($this->value < 0) {
            throw new InvalidArgumentException('Min weight value cannot be negative');
        }
    }
}