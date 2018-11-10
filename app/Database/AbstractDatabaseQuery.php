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
     * @param string $sql
     * @return array
     * @throws \Exception
     */
    public function fetchAll(string $sql)
    {
        $result = pg_query($this->connect(), $sql);

        return pg_fetch_all($result);
    }

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
        return QueryEnvironmentVariables::getVariable('DB_NAME');
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