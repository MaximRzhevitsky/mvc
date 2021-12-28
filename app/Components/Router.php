<?php

namespace App\Components;

class Router
{
    private $routes;
    public function __construct()
    {
        $routePath = ROOT . '/app/Configs/routes.php';
        $this->routes = include($routePath);
    }


    private function getUri()
    {
        if (!empty(trim($_SERVER['REQUEST_URI'], '/'))) {
           return trim($_SERVER['REQUEST_URI'], '/');
        }
        else return "home";
    }



    function run()
    {
        try {
            $uri = $this->getUri();

            foreach ($this->routes as $uriPattern => $path) {
                if (preg_match("~$uriPattern~", $uri)) {
                    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                    $segments = explode('/', $internalRoute);
                    $controllerName = '\\App\\Controllers\\' . ucfirst(array_shift($segments) . 'Controller');
                    $actionName = array_shift($segments);
                    $parameters = $segments;
                    $controllerObject = new $controllerName;
                    call_user_func_array([$controllerObject, $actionName], $parameters);
                    exit();
                }
            }
        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
        include ROOT . '/404.html';
    }
}