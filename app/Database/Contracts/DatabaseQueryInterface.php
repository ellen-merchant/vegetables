<?php

namespace Ellllllen\Database\Contracts;

interface DatabaseQueryInterface
{
    /**
     * @param string $sql
     * @return array
     */
    public function fetchAll(string $sql): array;
}