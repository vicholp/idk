<?php

namespace App\Routers;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/**
 * Base class that provides useful methods.
 *
 * All routers should extend this class.
 */
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

    /**
     * Add a new get route to the collection
     *
     * @param string $url Path of the route
     * @param string $name Name of the route used by Sympony
     * @param string $controller Controller class name
     * @param string $action Method name of the controller to be called
     */
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

    /**
     * Add a new post route to the collection
     *
     * @param string $url Path of the route
     * @param string $name Name of the route used by Sympony
     * @param string $controller Controller class name
     * @param string $action Method name of the controller to be called
     */
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
