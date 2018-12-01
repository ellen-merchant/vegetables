<?php

namespace Ellllllen\Database;

use Ellllllen\Helpers\QueryEnvironmentVariables;

abstract class AbstractDatabaseQuery
{
    /**
     * Open the database connection.
     *
     * @return resource
     * @throws \Exception
     */
    protected abstract function connect();

    /**
     * @return string
     */
    protected function getDatabaseHost(): string
    {
        return QueryEnvironmentVariables::getVariable('DB_HOST');
    }

    /**
     * @return int
     */
    protected function getDatabasePort(): int
    {
        return QueryEnvironmentVariables::getVariable('DB_PORT');
    }

    /**
     * @return string
     */
    protected function getDatabaseName(): string
    {
        return QueryEnvironmentVariables::getVariable('DB_DATABASE');
    }

    /**
     * @return string
     */
    protected function getDatabaseUsername(): string
    {
        return QueryEnvironmentVariables::getVariable('DB_USERNAME');
    }

    /**
     * @return string
     */
    protected function getDatabasePassword(): string
    {
        return QueryEnvironmentVariables::getVariable('DB_PASSWORD');
    }
}