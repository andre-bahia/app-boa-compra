<?php


namespace App\Domain\Company\Vo;

use App\Domain\Shared\Vo\StringValue;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
class CompanyName extends StringValue
{
    /**
     * @var string
     * @ORM\Column(type="string", name="name")
     */
    protected string $value;

    public function validate()
    {
        if (empty($this->value) || is_null($this->value)) {
            throw new \InvalidArgumentException('Company Name is required');
        }
    }

}