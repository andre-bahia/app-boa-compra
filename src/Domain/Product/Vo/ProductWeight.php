<?php


namespace App\Domain\Product\Vo;

use Doctrine\ORM\Mapping as ORM;
use InvalidArgumentException;

/**
 * @ORM\Embeddable()
 */
class ProductWeight
{
    /**
     * @var float
     * @ORM\Column(name="weight", type="decimal", precision=5, scale=2)
     */
    private float $weight;

    /**
     * ProductWeight constructor.
     * @param $weight
     */
    public function __construct(float $weight)
    {
        if ($weight <= 0) {
            throw new InvalidArgumentException('Weight must be greater than 0');
        }

        $this->weight = $weight;
    }

    public function getWeight(): float
    {
        return $this->weight;
    }
}