<?php

declare(strict_types=1);

namespace Test;

use Kata\Gossip;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../vendor/autoload.php';

class GossipTest extends TestCase
{
    public function testDrive()
    {
        $routes = [
            [2, 1, 2],
            [5, 2, 8]
        ];
        $gossip = new Gossip($routes);
        $response = $gossip->run();

        $this->assertEquals("never", $response);
    }

    public function testDriveWithThreeLines()
    {
        $routes = [
            [3, 1, 2, 3],
            [3, 2, 3, 1],
            [4, 2, 3, 4, 5]
        ];
        $gossip = new Gossip($routes);
        $response = $gossip->run();

        $this->assertEquals(5, $response);
    }
}
