<?php

namespace Ellllllen\Database\Contracts;

interface DatabaseQueryInterface
{
    /**
     * @param string $sql
     * @return array|null
     */
    public function fetchAll(string $sql);
}