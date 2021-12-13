<?php

namespace AdventOfCode;

class Day5
{
    private readonly array $strings;

    public function __construct(string $input)
    {
        $this->strings = explode("\n", $input);
    }

    public function part1(): int
    {
        $nice = array_filter(
            $this->strings,
            fn ($s) => preg_match("/(.)\\1/", $s)
                && preg_match("/.*[aeiou].*[aeiou].*[aeiou].*/", $s)
                && !preg_match("/ab|cd|pq|xy/", $s)
        );

        return count($nice);
    }

    public function part2(): int
    {
        $nice = array_filter(
            $this->strings,
            fn ($s) => preg_match("/(..).*\\1/", $s)
                && preg_match("/(.).\\1/", $s)
        );

        return count($nice);
    }
}

