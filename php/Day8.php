<?php

namespace AdventOfCode;

class Day8
{
    private readonly array $strings;

    public function __construct(string $input)
    {
        $this->strings = explode("\n", $input);
    }

    public function part1(): int
    {
        return array_sum(array_map(fn($item) => $this->unescapeDiff($item), $this->strings));
    }

    public function part2()
    {
        return array_sum(array_map(fn($item) => $this->escapeDiff($item), $this->strings));

    }

    private function unescapeDiff($string): int
    {
        $escaped = substr(preg_replace(['/\\\\\\\\/', '/\\\\"/', '/\\\\x\w\w/'], ['.',',','?'], $string), 1, -1);
        return strlen($string) - strlen($escaped);
    }

    private function escapeDiff($string): int
    {
        $unescape = '"'.preg_replace(['/\\\\/', '/"/'], ['\\\\\\\\','\\"'], $string).'"';
        return strlen($unescape) - strlen($string);
    }
}

