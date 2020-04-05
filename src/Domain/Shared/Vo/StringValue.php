<?php


namespace App\Domain\Shared\Vo;

abstract class StringValue
{
    protected $value;

    public function __construct(?string $value)
    {
        $this->value = $value;
        $this->validate();
    }


    public function value(): ?string
    {
        return $this->value;
    }

    public abstract function validate();
}