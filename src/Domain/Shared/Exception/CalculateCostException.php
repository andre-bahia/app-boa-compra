<?php


namespace App\Domain\Shared\Exception;


use Throwable;

class CalculateCostException extends \Exception
{
    public function __construct($message = "Something went wrong in calculating the distance cost of the winners", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}