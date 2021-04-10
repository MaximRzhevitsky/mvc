<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 19.08.2018
 * Time: 10:45
 */

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));

require __DIR__ . '/vendor/autoload.php';

use App\Components\Router;


$router = new Router();

$router->run();
