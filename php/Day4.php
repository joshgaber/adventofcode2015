<?php

namespace AdventOfCode;

class Day4
{
    public function __construct(private readonly string $hash) {}

    public function part1(): int
    {
        $i = 0;
        do {
            $hash = md5($this->hash . ++$i);
        } while (!str_starts_with($hash, '00000'));

        return $i;
    }

    public function part2(): int
    {
        $i = 0;
        do {
            $hash = md5($this->hash . ++$i);
        } while (!str_starts_with($hash, '000000'));

        return $i;
    }
}

