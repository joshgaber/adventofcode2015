<?php

namespace AdventOfCode;

class Day2
{
    private readonly array $dimensions;

    public function __construct(string $input)
    {
        $this->dimensions = array_map(
            fn ($d) => array_map(fn ($e) => intval($e), explode('x', $d)),
            explode("\n", $input)
        );
    }

    public function part1(): int
    {
        return array_sum(array_map(
            fn ($d) => $this->paper(...$d),
            $this->dimensions
        ));
    }

    public function part2(): int
    {
        return array_sum(array_map(
            fn ($d) => $this->ribbon(...$d),
            $this->dimensions
        ));
    }

    private function paper(int $length, int $width, int $height): int
    {
        return 2 * $length * $width
            + 2 * $length * $height
            + 2 * $width * $height
            + min($length * $width, $length * $height, $width * $height);
    }

    private function ribbon(int $length, int $width, int $height): int
    {
        return ($length + $width + $height - max($length, $width, $height)) * 2
            + $length * $width * $height;
    }
}
