<?php

namespace AdventOfCode;

class Day6
{
    private array $instructions;

    public function __construct(string $input)
    {
        $this->instructions = array_map(
            fn ($i) => [
                'switch' => trim(preg_split("/\\d/", $i)[0]),
                'positions' => array_map(fn ($x) => intval($x), preg_grep("/\\d/", preg_split("/[ ,]/", $i)))
            ],
            explode("\n", $input)
        );
    }

    public function part1(): int
    {
        $lights = array_fill(0, 1000, array_fill(0, 1000, false));
        foreach ($this->instructions as $i) {
            $this->adjust($lights, $i['switch'], ...$i['positions']);
        }

        return array_sum(array_map(fn ($l) => count(array_filter($l)), $lights));
    }

    public function part2(): int
    {
        $lights = array_fill(0, 1000, array_fill(0, 1000, 0));
        foreach ($this->instructions as $i) {
            $this->brightness($lights, $i['switch'], ...$i['positions']);
        }

        return array_sum(array_map(fn ($l) => array_sum($l), $lights));
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

