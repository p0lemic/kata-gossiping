<?php

declare(strict_types=1);

namespace Kata;

class Gossip
{
    private const MAX_STOPS_IN_A_DAY = 480;
    public int $stops = 1;
    /** @var array<Driver> */
    public array $drivers;

    public function __construct(private readonly array $routes)
    {
        foreach ($routes as $route) {
            $this->drivers[] = new Driver($route);
        }
    }

    public function run(): string|int
    {
        while ($this->stops <= self::MAX_STOPS_IN_A_DAY) {
            $this->shareGossips();

            if ($this->driverKnowAllGossips()) {
                break;
            } else {
                $this->moverDriversToNextStop();
                $this->stops++;
            }
        }

        return $this->stops > self::MAX_STOPS_IN_A_DAY ? 'never' : $this->stops;
    }

    private function shareGossips(): void
    {
        foreach ($this->drivers as $i => $driver) {
            foreach ($this->drivers as $j => $otherDriver) {
                if ($driver->getStop() === $otherDriver->getStop()) {
                    $driver->shareGossip($otherDriver);
                }
            }
        }
    }

    private function driverKnowAllGossips(): bool
    {
        $totalGossips = count($this->drivers);

        foreach ($this->drivers as $driver) {
            if ($driver->totalGossips() < $totalGossips) {
                return false;
            }
        }

        return true;
    }

    private function moverDriversToNextStop(): void
    {
        foreach ($this->drivers as $driver) {
            $driver->goToNextStop();
        }
    }
}
