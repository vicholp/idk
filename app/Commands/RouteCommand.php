<?php

namespace App\Commands;

use App\Routers\Router;

class RouteCommand
{
    public function list(): void
    {
        $routes = (new Router())->getRoutes();
        foreach ($routes as $route) {
            echo $route->getPath()."\n";
        }
    }
}
