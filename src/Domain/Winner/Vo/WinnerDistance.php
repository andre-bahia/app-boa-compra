<?php


namespace App\Domain\Winner\Vo;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class WinnerDistance
{
    /**
     * @var float $value
     * @ORM\Column(name="distance", type="decimal", precision=20, scale=6)
     */
    private float $value;

    public function __construct(float $value)
    {
        $this->value = $value;

        if (is_null($this->value) || empty($this->value)) {
            throw new \InvalidArgumentException('Winner distance is required');
        }
    }

    public function value(): float
    {
        return $this->value;
    }
}