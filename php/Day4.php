<?php

namespace AdventOfCode;

class Day4
{
    private const HASH = 'iwrupvqb';

    public function part1 ()
    {
        $i = 0;
        do {
            $hash = md5(self::HASH . ++$i);
        } while (substr($hash, 0, 5) !== '00000');

        printf("Lowest integer: %d\n", $i);
    }

    public function part2 ()
    {
        $i = 0;
        do {
            $hash = md5(self::HASH . ++$i);
        } while (substr($hash, 0, 6) !== '000000');

        printf("Lowest integer: %d\n", $i);
    }
}

