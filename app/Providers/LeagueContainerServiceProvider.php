<?php

namespace Ellllllen\Providers;

use Ellllllen\Database\QueryPostgreSql;
use League\Container\ServiceProvider\AbstractServiceProvider;
use Sabre\HTTP\Response;

class LeagueContainerServiceProvider extends AbstractServiceProvider
{
    /**
     * @var array
     */
    protected $provides = [
        \Ellllllen\Controllers\VegetableController::class,
        \Ellllllen\Vegetables::class,
        \Ellllllen\Database\Contracts\DatabaseQueryInterface::class
    ];

    /**
     * Use the register method to register items with the container via the
     * protected $this->container property or the `getContainer` method
     * from the ContainerAwareTrait.
     *
     * @return void
     */
    public function register()
    {
        $response = $this->handleResponse();

        $this->getContainer()
            ->add(\Ellllllen\Controllers\VegetableController::class)
            ->addArgument($response)
            ->addArgument(\Ellllllen\Vegetables::class);

        $this->getContainer()
            ->add(\Ellllllen\Vegetables::class)
            ->addArgument(\Ellllllen\Database\Contracts\DatabaseQueryInterface::class);

        $this->getContainer()
            ->add(\Ellllllen\Database\Contracts\DatabaseQueryInterface::class, QueryPostgreSql::class);
    }

    /**
     * @return Response
     */
    private function handleResponse(): Response
    {
        $response = new Response();
        $response->setHeader('Content-Type', 'application/json');

        return $response;
    }
}