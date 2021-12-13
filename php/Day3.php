<?php

namespace AdventOfCode;

class Day3
{
    private readonly array $moves;

    public function __construct(string $input)
    {
        $this->moves = str_split($input);
    }

    public function part1(): int
    {
        $santa = ['x' => 0, 'y' => 0];
        $houses = ['x0y0'];

        foreach ($this->moves as $move) {
            $this->move($santa, $houses, $move);
        }

        return count(array_unique($houses));
    }

    public function part2(): int
    {
        $santa = ['x' => 0, 'y' => 0];
        $robot = ['x' => 0, 'y' => 0];
        $houses = ['x0y0'];

        foreach ($this->moves as $step => $move) {
            $step % 2 === 0
            ? $this->move($santa, $houses, $move)
            : $this->move($robot, $houses, $move);
        }

        return count(array_unique($houses));
    }

    private function move(array &$santa, array &$houses, string $move)
    {
        switch ($move) {
            case '>':
                $santa['x']++;
            break;
            case '<':
                $santa['x']--;
            break;
            case '^':
                $santa['y']++;
            break;
            case 'v':
                $santa['y']--;
        }

        $houses[] = "x{$santa['x']}y{$santa['y']}";
    }
}
