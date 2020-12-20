<?php

namespace AdventOfCode;

class Day6
{
    private array $instructions;

    public function __construct()
    {
        $this->instructions = array_map(
            fn ($i) => [
                'switch' => trim(preg_split("/\\d/", $i)[0]),
                'positions' => array_map(fn ($x) => intval($x), preg_grep("/\\d/", preg_split("/ |,/", $i)))
            ],
            explode("\n", trim(load('day6.txt')))
        );
    }
    public function part1 ()
    {
        $lights = array_fill(0, 1000, array_fill(0, 1000, false));
        foreach ($this->instructions as $i) {
            $this->adjust($lights, $i['switch'], ...$i['positions']);
        }

        $lit = array_reduce($lights, fn ($acc, $l) => $acc + count(array_filter($l)), 0);

        printf("Lights lit: %d\n", $lit);
    }

    public function part2 ()
    {
        $lights = array_fill(0, 1000, array_fill(0, 1000, 0));
        foreach ($this->instructions as $i) {
            $this->brightness($lights, $i['switch'], ...$i['positions']);
        }

        $lit = array_reduce($lights, fn ($acc, $l) => $acc + array_reduce($l, fn($acc2, $l2) => $acc2 + $l2, 0), 0);

        printf("Total Brightness: %d\n", $lit);
    }

    public function adjust(&$lights, $switch, $startX, $startY, $endX, $endY)
    {
        for ($x = $startX; $x <= $endX; $x++) {
            for ($y = $startY; $y <= $endY; $y++) {
                $lights[$x][$y] = match($switch) {
                    'turn on' => true,
                    'turn off' => false,
                    'toggle' => !$lights[$x][$y]
                };
            }
        }
    }

    public function brightness(&$lights, $switch, $startX, $startY, $endX, $endY)
    {
        for ($x = $startX; $x <= $endX; $x++) {
            for ($y = $startY; $y <= $endY; $y++) {
                $lights[$x][$y] += match($switch) {
                    'turn on' => 1,
                    'turn off' => -1,
                    'toggle' => 2
                };
                $lights[$x][$y] = max(0, $lights[$x][$y]);
            }
        }
    }
}

