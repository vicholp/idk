<?php

namespace App\Routers;

use App\Controllers\MainController;
use Symfony\Component\Routing\RouteCollection;

class WebRouter extends BaseRouter
{
    public function routes(): RouteCollection
    {
        $this->get('/', 'index', MainController::class, 'index');

        $this->get('/docs', 'docs', MainController::class, 'docs');
        $this->get('/openapi', 'openapi', MainController::class, 'openapi');

        return $this->routes;
    }
}
