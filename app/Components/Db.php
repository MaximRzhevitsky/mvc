<?php

namespace App\Components;

use PDO;
use PDOException;

class Db
{
    private static $connection;

    private function __construct()
    {
    }

    public static function getConnection()
    {
        try {
            $paramsPath = ROOT . '/app/Configs/db_params.php';

            $dbParams = include($paramsPath);

            if (static::$connection === null) {
                static::$connection = new PDO("mysql:host={$dbParams['host']}; dbname={$dbParams['dbName']}",
                    $dbParams['user'], $dbParams['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

                return static::$connection;
            }

            return static::$connection;
        } catch (PDOException $ex) {
            echo 'Не работает';
            die;
        }
    }
}