<?php

namespace Ellllllen\Database;

use Ellllllen\Database\Contracts\DatabaseQueryInterface;

class QueryPostgreSql extends AbstractDatabaseQuery implements DatabaseQueryInterface
{
    /**
     * {@inheritdoc}
     */
    protected function connect()
    {
        $connection = pg_connect("
            host=" . $this->getDatabaseHost() . "
            port=" . $this->getDatabasePort() . "
            dbname=" . $this->getDatabaseName() . "
            user=" . $this->getDatabaseUsername() . "
            password=" . $this->getDatabasePassword());

        if ($connection === false) {
            throw new \Exception("PostgreSQL connection not established");
        }

        return $connection;
    }

    /**
     * @param string $sql
     * @return array
     * @throws \Exception
     */
    public function fetchAll(string $sql):array
    {
        $result = pg_query($this->connect(), $sql);

        return pg_fetch_all($result);
    }
}