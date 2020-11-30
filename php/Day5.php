<?php

namespace AdventOfCode;

class Day5
{
    private array $strings;

    public function __construct()
    {
        $this->strings = explode("\n", trim(load('day5.txt')));
    }

    public function part1 ()
    {
        $nice = array_filter(
            $this->strings,
            fn ($s) => preg_match("/(.)\\1/", $s)
                && preg_match("/.*[aeiou].*[aeiou].*[aeiou].*/", $s)
                && !preg_match("/ab|cd|pq|xy/", $s)
        );

        printf("Nice strings: %d\n", count($nice));
    }

    public function part2 ()
    {
        $nice = array_filter(
            $this->strings,
            fn ($s) => preg_match("/(..).*\\1/", $s)
                && preg_match("/(.).\\1/", $s)
        );

        printf("Nice strings: %d\n", count($nice));
    }
}

