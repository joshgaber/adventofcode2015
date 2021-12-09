<?php

if (!function_exists('load')) {
    function load($filename)
    {
        return trim(file_get_contents(__DIR__ . '/data/' . $filename));
    }

    function array_permutations($array)
    {
        if (count($array) < 2) {
            return [$array];
        }

        $arrays = [];

        foreach ($array as $item) {
            $subarrays = array_permutations(array_diff($array, [$item]));
            array_map(function (array $a) use (&$arrays, $item) {
                $arrays[] = [$item, ...$a];
            }, $subarrays);
        }

        return $arrays;
    }
}
