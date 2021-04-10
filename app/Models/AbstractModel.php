<?php

namespace App\Models;

use App\Components\Db;

abstract class AbstractModel
{
    protected $connection;

    public function __construct()
    {
        $this->connection = Db::getConnection();
    }
}