<?php

include __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

/**
 * Dependency Injection
 */
$container = new League\Container\Container();
$container->addServiceProvider(Ellllllen\Providers\LeagueContainerServiceProvider::class);

/**
 * CLI Handling
 */
if (isset($argv)) {
    if (!isset($argv[1])) {
        throw new \Exception("Please add an argument on the end of your script, e.g. php index.php --list-veg");
    }

    $argument = $argv[1];

} else {
    /**
     * Routing
     */
    $router = new Phroute\Phroute\RouteCollector();
    include_once __DIR__ . '/../config/routes.php';
    $resolver = new Ellllllen\Routing\RouterResolver($container);

    /**
     * Dispatching
     */
    $dispatcher = new Phroute\Phroute\Dispatcher($router->getData(), $resolver);
    $response = $dispatcher->dispatch(
        $_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
    );

    /**
     * Returning a response
     */
    Sabre\HTTP\Sapi::sendResponse($response);
}