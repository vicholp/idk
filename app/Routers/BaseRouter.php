<?php

namespace App\Routers;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class BaseRouter
{
    protected RouteCollection $routes;

    public function __construct()
    {
        $this->routes = new RouteCollection();
    }

    public function routes(): RouteCollection
    {
        return $this->routes;
    }

    protected function get(string $url, string $name, string $controller, string $action): void
    {
        $this->routes->add($name, new Route(
            $url,
            [
                '_controller' => $controller,
                '_action' => $action,
            ],
            methods: ['GET']
        ));
    }

    protected function post(string $url, string $name, string $controller, string $action): void
    {
        $this->routes->add($name, new Route(
            $url,
            [
                '_controller' => $controller,
                '_action' => $action,
            ],
            methods: ['POST']
        ));
    }
}
