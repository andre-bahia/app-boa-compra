<?php


namespace App\Tests\Domain\Winner\Vo;


use App\Domain\Winner\Vo\WinnerDistance;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class WinnerDistanceTest extends TestCase
{
    public function testInitProductWeight()
    {
        $winnerDistance = new WinnerDistance(350);
        $this->assertInstanceOf(WinnerDistance::class, $winnerDistance);
        $this->assertEquals(350, $winnerDistance->value());
    }
}