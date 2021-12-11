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

    public function part1()
    {
        $total = array_reduce(
            $this->dimensions,
            fn ($init, $d) => $init + $this->paper(...$d),
            0
        );
        printf("Total wrapping paper: %d\n", $total);
    }

    public function part2()
    {
        $total = array_reduce(
            $this->dimensions,
            fn ($init, $d) => $init + $this->ribbon(...$d),
            0
        );
        printf("Total wrapping paper: %d\n", $total);
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
