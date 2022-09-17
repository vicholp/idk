<?php

namespace App\Commands;

use App\Routers\Router;

class RouteCommand
{
    public function list(): void
    {
        $routes = (new Router())->getRoutes();

        foreach ($routes as $route) {
            dump($route->getPath() . ' -> ' . $route->getDefaults()['_controller'] . '::' .$route->getDefaults()['_action']);
        }
    }
}
