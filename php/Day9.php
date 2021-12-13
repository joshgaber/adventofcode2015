<?php

namespace AdventOfCode;

use AdventOfCode\Day9\City;

class Day9
{
    /** @var City[] $cities */
    private array $cities;

    public function __construct(string $input)
    {
        $paths = explode("\n", $input);
        foreach ($paths as $path) {
            $matches = [];
            preg_match('/(\w+) to (\w+) = (\d+)/', $path, $matches);

            $this->cities[$matches[1]] ??= new City($matches[1]);
            $this->cities[$matches[2]] ??= new City($matches[2]);

            $this->cities[$matches[1]]->addDestination($matches[2], $matches[3]);
            $this->cities[$matches[2]]->addDestination($matches[1], $matches[3]);
        }
    }

    public function part1(): int
    {
        $paths = array_map(fn(array $a) => $this->path_distance($a), array_permutations($this->cities));
        return min(...$paths);
    }

    public function part2(): int
    {
        $paths = array_map(fn(array $a) => $this->path_distance($a), array_permutations($this->cities));
        return max(...$paths);
    }

    /**
     * @param City[] $cities
     * @return int
     */
    private function path_distance(array $cities): int
    {
        $distances = [];
        $lastCity = array_shift($cities);
        foreach ($cities as $city) {
            $distances[] = $city->destinations[$lastCity->name];
            $lastCity = $city;
        }
        return array_sum($distances);
    }
}

