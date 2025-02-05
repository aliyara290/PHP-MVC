<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function addRoute($path, $controller, $action, $method)
    {
        $this->routes[$method][$path] = ["controller" => $controller, "action" => $action];
    }
    public function get($path, $controller, $action)
    {
        $this->addRoute($path, $controller, $action, "GET");
    }
    public function post($path, $controller, $action)
    {
        $this->addRoute($path, $controller, $action, "POST");
    }
    public function dispatch()
    {
        $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $requestMethod = $_SERVER["REQUEST_METHOD"];
        if (isset($this->routes[$requestMethod]) && array_key_exists($uri, $this->routes[$requestMethod])) {
            $controller = $this->routes[$requestMethod][$uri]["controller"];
            $action = $this->routes[$requestMethod][$uri]["action"];
            $controller = new $controller();
            $controller->$action();
        } else {
            header("location: /404.php");
        }
    }
}
