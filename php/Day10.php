<?php

namespace AdventOfCode;

class Day10
{
    public function __construct(private readonly string $sequence) {}

    public function part1(): int
    {
        $sequence = $this->sequence;

        for($i = 0; $i < 40; $i++) {
            $sequence = $this->resequence($sequence);
        }

        return strlen($sequence);
    }

    public function part2 ()
    {
        $sequence = $this->sequence;

        for($i = 0; $i < 50; $i++) {
            $sequence = $this->resequence($sequence);
        }

        return strlen($sequence);
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

