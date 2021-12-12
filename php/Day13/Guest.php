<?php

namespace AdventOfCode\Day13;

class Guest
{
    private array $happinessRules = [];

    public function __construct(public readonly string $name) {}

    public function addRule(Guest $guest, int $happiness): void
    {
        $this->happinessRules[$guest->name] = $happiness;
    }

    public function getHappiness(string ...$guests): int
    {
        return array_sum(array_map(fn (string $name) => $this->happinessRules[$name] ?? 0, $guests));
    }
}