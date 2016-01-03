<?php

function __autoload($class)
{
    $parts = explode('\\', $class);
    unset($parts[0]);
    require __DIR__ . '/' . implode('/', $parts) . '.php';
    return true;
}