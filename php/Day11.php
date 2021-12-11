<?php

namespace AdventOfCode;

class Day11
{
    public function __construct(private readonly string $password) {}

    public function part1()
    {
        echo "PART 1: {$this->nextValidPassword($this->password)}\n";
    }

    public function part2()
    {
        echo "PART 2: {$this->nextValidPassword($this->nextValidPassword($this->password))}\n";
    }

    private function nextValidPassword(string $password): string {
        do {
            $password = $this->nextPassword($password);
        } while (!$this->isValidPassword($password));

        return $password;
    }

    private function isValidPassword(string $password): bool
    {
        if (!preg_match('/[a-hjkmnp-z]+/', $password)) {
            return false;
        }

        if (!preg_match('/.*(.)\1.*(.)\2.*/', $password)) {
            return false;
        }

        for ($i = 2; $i < strlen($password); $i++) {
            if (ord($password[$i]) == ord($password[$i - 1]) + 1 && ord($password[$i]) == ord($password[$i - 2]) + 2) {
                return true;
            }
        }

        return false;
    }

    private function nextPassword(string $password): string {
        if (strlen($password) !== 8) {
            throw new \Exception();
        }
        $newChars = substr($password, -1);

        while (str_starts_with($newChars, 'z')) {
            $newChars = substr($password, -1 - strlen($newChars), 1) . str_replace('z', 'a', $newChars);
        }

        return substr($password, 0, strlen($password) - strlen($newChars)) . $this->nextLetter(substr($newChars, 0, 1)) . substr($newChars, 1);
    }

    private function nextLetter(string $char) {
        if (strlen($char) !== 1) {
            throw new \Exception();
        }

        return chr(ord($char) + 1);
    }
}

