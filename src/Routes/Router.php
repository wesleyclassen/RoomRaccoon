<?php

namespace Wes\Mvc\Routes;

use Exception;

class Router
{

    protected array $routes = [];

    /**
     * @throws Exception
     */
    public function analyse()
    {
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $method = $_SERVER['REQUEST_METHOD'];

        if (array_key_exists($uri, $this->routes[$method])) {
            $controller = $this->routes[$method][$uri]['controller'];
            $action = $this->routes[$method][$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            throw new Exception("No route found for URI: $uri");
        }

    }


    private function addRoute($path, $controller, $action, $method)
    {
        $this->routes[$method][$path] = ['controller' => $controller, 'action' => $action];
    }


    public function get($path, $controller, $action)
    {
        $this->addRoute($path, $controller, $action, "GET");
    }

    public function post($path, $controller, $method)
    {
        $this->addRoute($path, $controller, $method, "POST");
    }

    public function put($path, $controller, $method)
    {
        $this->addRoute($path, $controller, $method, "PUT");
    }

    public function delete($path, $controller, $method)
    {
        $this->addRoute($path, $controller, $method, "DELETE");
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function getRoute($name)
    {
        return $this->routes[$name];
    }

    public function getRoutePath($name)
    {
        return $this->routes[$name]['path'];
    }

    public function getRouteController($name)
    {
        return $this->routes[$name]['controller'];
    }

    public function getRouteMethod($name)
    {
        return $this->routes[$name]['method'];
    }

    public function getRouteNames()
    {
        return array_keys($this->routes);
    }

    public function getRouteByName($name)
    {
        return $this->routes[$name];
    }

    public function getRouteByNamePath($name)
    {
        return $this->routes[$name]['path'];
    }

    public function getRouteByNameController($name)
    {
        return $this->routes[$name]['controller'];
    }

    public function getRouteByNameMethod($name)
    {
        return $this->routes[$name]['method'];
    }

    public function getRouteByNameNames()
    {
        return array_keys($this->routes);
    }
}