<?php

namespace Ellllllen;

use Ellllllen\Database\Contracts\DatabaseQueryInterface;

class Vegetables
{
    /**
     * @var DatabaseQueryInterface
     */
    private $databaseConnection;

    /**
     * Vegetables constructor.
     * @param DatabaseQueryInterface $databaseConnection
     */
    public function __construct(DatabaseQueryInterface $databaseConnection)
    {
        $this->databaseConnection = $databaseConnection;
    }

    /**
     * Get all vegetables.
     *
     * @return array|null
     */
    public function get()
    {
        $sql = 'select * from "vegetables"';

        return $this->databaseConnection->fetchAll($sql);
    }
}