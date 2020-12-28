<?php

namespace AdventOfCode;

class Day7
{
    public function __construct()
    {
        $this->commands = array_column(
                array_map(
                fn ($command) => explode(' -> ', $command),
                explode("\n", str_replace(
                    ['AND', 'OR', 'NOT', 'LSHIFT', 'RSHIFT'],
                    ['&', '|', '~', '<<', '>>'],
                    load('day7.txt')
                ))
            ),
        0, 1);
    }

    public function part1()
    {
        printf("Wire [a] value: %s\n", $this->calculate($this->commands)['a']);
    }

    public function part2 ()
    {
        $a = $this->calculate($this->commands)['a'];
        $commands = $this->commands;
        $commands['b'] = $a;

        printf("Wire [a] value after second pass: %s\n", $this->calculate($commands)['a']);
    }

    private function calculate($commands)
    {
        $results = [];

        do {
            $evaluated = array_map(fn ($c) => eval("return (${c}) & 65535;"), array_filter(
                $commands,
                fn ($c) => !preg_match('/[a-z]/', $c),
            ));

            $commands = array_diff_key($commands, $evaluated);

            $results += $evaluated;

            $commands = array_map(
                fn ($command) => preg_replace($this->varReplace(array_keys($results)), array_values($results), $command),
                $commands
            );
        } while (!isset($results['a']));

        return $results;
    }

    private function varReplace($vars)
    {
        return array_map(fn ($v) => "/(?<![a-z]){$v}(?![a-z])/", $vars);
    }
}

