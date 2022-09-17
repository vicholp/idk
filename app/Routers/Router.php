<?php

namespace App\Routers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

/**
 * Performs the routing inside the route() method.
 */
class Router
{
    private RouteCollection $routes;

    public function __construct()
    {
        $this->routes = new RouteCollection();

        $this->register();
    }

    /**
     * Register routes classes.
     */
    private function register(): void
    {
        $this->routes->addCollection((new WebRouter())->routes());
    }

    /**
     * Get the routes as a RouteCollection object.
     */
    public function getRoutes(): RouteCollection
    {
        return $this->routes;
    }

    /**
     * Takes the global context and call the controller action.
     */
    public function route(): Response
    {
        $request = Request::createFromGlobals();

        $context = new RequestContext();
        $context->fromRequest($request);

        $matcher = new UrlMatcher($this->routes, $context);
        $parameters = $matcher->match($request->getPathInfo());

        $args = $parameters;
        unset($args['_controller']);
        unset($args['_action']);
        unset($args['_route']);

        return (new $parameters['_controller']())->{$parameters['_action']}($request, ...$args);
    }
}
