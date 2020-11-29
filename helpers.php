<?php

if (!function_exists('load')) {
    function load($filename)
    {
        return file_get_contents(__DIR__ . '/data/' . $filename);
    }
}
