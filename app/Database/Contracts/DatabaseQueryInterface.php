<?php

namespace Ellllllen\Database\Contracts;

interface DatabaseQueryInterface
{
    public function fetchAll(string $sql);
}