<?php

namespace AdventOfCode;

class Day12
{
    public function __construct(private readonly string $books) {}

    public function part1()
    {
        $matches = [];
        preg_match_all('/-?\\d+/', $this->books, $matches);

        $total = array_sum(array_map(fn ($num) => intval($num), $matches[0]));
        echo "PART 1: {$total}\n";
    }

    public function part2()
    {
        $books = json_decode($this->books, true);
        $books = $this->array_remove_red($books);
        $fixedBooks = json_encode($books);

        $matches = [];
        preg_match_all('/-?\\d+/', $fixedBooks, $matches);

        $total = array_sum(array_map(fn ($num) => intval($num), $matches[0]));
        echo "PART 1: {$total}\n";
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

