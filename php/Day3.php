<?php

namespace AdventOfCode;

class Day3
{
    private $moves;

    public function __construct()
    {
        $this->moves = str_split(trim(load('day3.txt')));
    }

    public function part1()
    {
        $santa = ['x' => 0, 'y' => 0];
        $houses = ['x0y0'];

        foreach ($this->moves as $move) {
            $this->move($santa, $houses, $move);
        }

        printf("Total houses visited: %d\n", count(array_unique($houses)));
    }

    public function part2()
    {
        $santa = ['x' => 0, 'y' => 0];
        $robot = ['x' => 0, 'y' => 0];
        $houses = ['x0y0'];

        foreach ($this->moves as $step => $move) {
            $step % 2 === 0
            ? $this->move($santa, $houses, $move)
            : $this->move($robot, $houses, $move);
        }

        printf("Total houses visited: %d\n", count(array_unique($houses)));
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
