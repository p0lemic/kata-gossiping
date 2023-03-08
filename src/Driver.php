<?php
declare(strict_types=1);

namespace Kata;

class Driver
{
    public array $gossips;
    private int $currentStopPosition = 0;

    public function __construct(
        private readonly array $route
    )
    {
        $this->gossips = [bin2hex(random_bytes(18))];
    }

    public function getStop(): int
    {
        return $this->route[$this->currentStopPosition];
    }

    public function goToNextStop(): void
    {
        $this->currentStopPosition = ($this->currentStopPosition + 1) % count($this->route);
    }

    public function shareGossip(Driver $otherDriver): void
    {
        $sharedGossips = array_unique(array_merge($this->gossips, $otherDriver->gossips));
        $this->gossips = $sharedGossips;
        $otherDriver->gossips = $sharedGossips;
    }

    public function totalGossips(): int
    {
        return count($this->gossips);
    }
}