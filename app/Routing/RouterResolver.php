<?php

namespace Ellllllen\Routing;

use League\Container\Container;
use Phroute\Phroute\HandlerResolverInterface;

class RouterResolver implements HandlerResolverInterface
{
    /**
     * @var Container
     */
    private $container;

    /**
     * RouterResolver constructor.
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * Create an instance of the given handler.
     *
     * @param $handler
     * @return array
     */
    public function resolve($handler)
    {
        if (is_array($handler) and is_string($handler[0])) {
            $handler[0] = $this->container->get($handler[0]);
        }

        return $handler;
    }
}