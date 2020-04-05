<?php


namespace App\Domain\Shared\Vo;


abstract class Money
{
    protected float $value;

    public function __construct(?float $value)
    {
        $this->value = $value;
        $this->validate();
    }

    public function value(): ?float
    {
        return $this->value;
    }

    public abstract function validate();
}