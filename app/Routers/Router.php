<?php

namespace App\Routers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;

class Router
{
    private RouteCollection $routes;

    public function __construct()
    {
        $this->routes = new RouteCollection();

        $this->register();
    }

    private function register(): void
    {
        $this->routes->addCollection((new WebRouter())->routes());
    }

    public function getRoutes(): RouteCollection
    {
        return $this->routes;
    }

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
