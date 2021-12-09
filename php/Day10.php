<?php

namespace AdventOfCode;

class Day10
{
    private string $sequence;

    public function __construct() {
        $this->sequence = trim(load('day10.txt'));
    }

    public function part1 ()
    {
        $sequence = $this->sequence;

        for($i = 0; $i < 40; $i++) {
            $sequence = $this->resequence($sequence);
        }

        echo "PART 1: " . strlen($sequence) . "\n";
    }

    public function part2 ()
    {
        $sequence = $this->sequence;

        for($i = 0; $i < 50; $i++) {
            $sequence = $this->resequence($sequence);
        }

        echo "PART 2: " . strlen($sequence) . "\n";
    }

    public function resequence(string $sequence): string
    {
        $newSequence = [];
        $sequenceArray = str_split($sequence);
        $prevChar = array_shift($sequenceArray);
        $count = 1;

        foreach ($sequenceArray as $char) {
            if ($char == $prevChar) {
                $count++;
            } else {
                $newSequence[] = "{$count}";
                $newSequence[] = $prevChar;
                $prevChar = $char;
                $count = 1;
            }
        }

        $newSequence[] = "{$count}";
        $newSequence[] = $prevChar;

        return implode('', $newSequence);
    }
}

