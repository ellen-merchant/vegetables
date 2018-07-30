<?php

if (!isset($argv[1])) {
    throw new Exception("Please add an argument on the end of your script, e.g. php index.php --list-veg");
}

$argument = $argv[1];

include __DIR__ . '/vendor/autoload.php';

use Phroute\Phroute\Dispatcher;

$router = new Phroute\Phroute\RouteCollector();
include __DIR__ . '/config/routes.php';

$dispatcher = new Dispatcher($router->getData());

echo $dispatcher->dispatch('GET', '/vegetables'), "\n";