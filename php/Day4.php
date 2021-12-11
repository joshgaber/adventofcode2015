<?php

namespace AdventOfCode;

class Day4
{
    public function __construct(private readonly string $hash) {}

    public function part1 ()
    {
        $i = 0;
        do {
            $hash = md5($this->hash . ++$i);
        } while (!str_starts_with($hash, '00000'));

        printf("Lowest integer: %d\n", $i);
    }

    public function part2 ()
    {
        $i = 0;
        do {
            $hash = md5($this->hash . ++$i);
        } while (!str_starts_with($hash, '000000'));

        printf("Lowest integer: %d\n", $i);
    }
}

