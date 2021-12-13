<?php

namespace AdventOfCode;

class Day1
{
    private readonly array $steps;

    public function __construct(string $input)
    {
        $this->steps = str_split($input);
    }

    public function part1(): int
    {
        $stages = ['(' => 0, ')' => 0];

        foreach ($this->steps as $step) {
            $stages[$step]++;
        }

       return $stages['('] - $stages[')'];
    }

    public function part2(): int
    {
        $step = $floor = 0;

        do {
            $floor += ($this->steps[$step++] === '(' ? 1 : -1);
        } while ($floor >= 0);

       return $step;
    }
}
