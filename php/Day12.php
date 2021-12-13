<?php

namespace AdventOfCode;

class Day12
{
    public function __construct(private readonly string $books) {}

    public function part1(): int
    {
        $matches = [];
        preg_match_all('/-?\\d+/', $this->books, $matches);

        return array_sum(array_map(fn ($num) => intval($num), $matches[0]));
    }

    public function part2(): int
    {
        $books = json_decode($this->books, true);
        $books = $this->array_remove_red($books);
        $fixedBooks = json_encode($books);

        $matches = [];
        preg_match_all('/-?\\d+/', $fixedBooks, $matches);

        return array_sum(array_map(fn ($num) => intval($num), $matches[0]));
    }

    private function array_remove_red(array $array): array
    {
        foreach($array as $key => &$value) {
            if (is_array($value)) {
                if (!array_is_list($value) && in_array('red', $value)) {
                    unset($array[$key]);
                } else {
                    $array[$key] = $this->array_remove_red($value);
                }
            }
        }

        return array_values($array);
    }
}

