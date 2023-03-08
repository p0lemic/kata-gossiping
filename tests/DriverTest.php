<?php
declare(strict_types=1);

namespace Test;

use Kata\Driver;
use PHPUnit\Framework\TestCase;

class DriverTest extends TestCase
{
    public function testCreateADriverWithARoute(): void
    {
        $route = [2, 1, 2];
        $driver = new Driver($route);

        $this->assertEquals(2, $driver->getStop());
        $this->assertCount(1, $driver->gossips);
    }

    public function testMoveADriverToTheNextStop(): void
    {
        $route = [2, 1, 2];
        $driver = new Driver($route);

        $this->assertEquals(2, $driver->getStop());
        $driver->goToNextStop();
        $this->assertEquals(1, $driver->getStop());
    }

    public function testShareGossipsWithAnotherDriver(): void
    {
        $route = [2, 1, 2];
        $driver = new Driver($route);
        $route2 = [5, 1, 3];
        $driver2 = new Driver($route2);

        $driver->shareGossip($driver2);

        $this->assertEquals(2, $driver->totalGossips());
        $this->assertEquals(2, $driver2->totalGossips());
    }
}