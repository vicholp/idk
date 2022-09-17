<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Routers\Router;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$router = new Router();
$response = $router->route();
$response->send();
