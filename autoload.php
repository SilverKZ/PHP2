<?php

function __autoload($class)
{
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

    if (is_readable($file)) {
        require $file;
    }
}

