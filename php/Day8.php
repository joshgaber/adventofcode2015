<?php

namespace AdventOfCode;

class Day8
{
    public function __construct()
    {
        $this->strings = explode("\n", load('day8.txt'));
    }

    public function part1()
    {
        $diff = array_sum(array_map(fn($item) => $this->unescapeDiff($item), $this->strings));
        printf("Space saved after unescaping: %d\n", $diff);
    }

    public function part2()
    {
        $diff = array_sum(array_map(fn($item) => $this->escapeDiff($item), $this->strings));
        printf("Space used after escaping: %d\n", $diff);

    }

    private function unescapeDiff($string)
    {
        $escaped = substr(preg_replace(['/\\\\\\\\/', '/\\\\"/', '/\\\\x\w\w/'], ['.',',','?'], $string), 1, -1);
        return strlen($string) - strlen($escaped);
    }

    private function escapeDiff($string)
    {
        $unescape = '"'.preg_replace(['/\\\\/', '/"/'], ['\\\\\\\\','\\"'], $string).'"';
        return strlen($unescape) - strlen($string);
    }
}

