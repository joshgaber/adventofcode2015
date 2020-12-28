<?php

if (!function_exists('load')) {
    function load($filename)
    {
        return trim(file_get_contents(__DIR__ . '/data/' . $filename));
    }
}
