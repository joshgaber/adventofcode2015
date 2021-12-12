<?php

namespace AdventOfCode;

use AdventOfCode\Day13\Guest;

class Day13
{
    /** @var Guest[] $guests */
    private array $guests = [];

    public function __construct(string $input) {
        $rules = explode("\n", $input);
        foreach ($rules as $rule) {
            $matches = [];
            preg_match('/(\w+) would (gain|lose) (\d+) happiness units? by sitting next to (\w+)\\./', $rule, $matches);
            $this->guests[$matches[1]] ??= new Guest($matches[1]);
            $this->guests[$matches[4]] ??= new Guest($matches[4]);
            $this->guests[$matches[1]]->addRule($this->guests[$matches[4]], intval($matches[3]) * ($matches[2] == 'lose' ? -1 : 1));
        }
    }
    public function part1()
    {
        echo $this->maximumHappiness($this->guests);
    }

    public function part2()
    {
        echo $this->maximumHappiness(['Myself' => new Guest('Myself'), ...$this->guests]);
    }

    private function maximumHappiness(array $guests): int
    {
        $names = array_keys($guests);
        $maxHappiness = 0;

        foreach (array_permutations($names) as $keys) {
            $happinessTotal = 0;

            foreach ($keys as $order => $name)
            {
                $happinessTotal += $guests[$name]->getHappiness(
                    $keys[($order + 1) % count($keys)],
                    $keys[($order + count($keys) - 1) % count($keys)]
                );
            }

            $maxHappiness = max($maxHappiness, $happinessTotal);
        }

        return $maxHappiness;
    }
}

