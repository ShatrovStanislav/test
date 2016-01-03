<?php

require_once __DIR__ . '/autoload.php';

$file = '';
$class = '';
$method = '';

if (empty($_GET['ctrl']) == false) {
    $file = ucfirst($_GET['ctrl']);
    $class = 'App\\Controllers\\' . $file;
}

if (empty($_GET['act']) == false) {
    $method = 'action' . ucfirst($_GET['act']);
}

if (file_exists(__DIR__ . '/Controllers/' . $file . '.php') == false) {
    $class = 'App\\Controllers\\Articles';
}

if (in_array($method, get_class_methods($class)) == false) {
    $class = 'App\\Controllers\\Articles';
    $method = 'actionAll';
}

session_start();

try {
    $item = new $class();
    $item->$method();
} catch (\App\Services\MyException $e) {
    $e->display();
}