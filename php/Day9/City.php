<?php

namespace AdventOfCode\Day9;

class City
{
    public array $destinations = [];

    public function __construct(public readonly string $name) {}

    public function addDestination(string $destination, int $distance): void
    {
        $this->destinations[$destination] = $distance;
    }

    public function __toString()
    {
        return $this->name;
    }
}