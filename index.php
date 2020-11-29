<?php

require "vendor/autoload.php";
require "helpers.php";

$class = "AdventOfCode\Day{$argv[1]}";
$challenge = new $class;

if ($argc > 2) {
    printf("=== Day %s: Part %s ===\n", $argv[1], $argv[2]);
    call_user_func([$challenge, "part{$argv[2]}"]);
} else {
    printf("=== Day %s ===\n", $argv[1]);
    call_user_func([$challenge, "part1"]);
    call_user_func([$challenge, "part2"]);
}
