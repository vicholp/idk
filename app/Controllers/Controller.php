<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class Controller
{
    protected static function json(array $data): JsonResponse
    {
        return new JsonResponse($data);
    }

    protected static function ok(): Response
    {
        return new Response('OK', 200);
    }

    protected static function view(string $view, array $params = []): Response
    {
        ob_start();

        foreach ($params as $key => $p) {
            $$key = $p;
        }

        include '../app/Resources/php/'.$view.'.php';

        // @phpstan-ignore-next-line
        return new Response(ob_get_clean());
    }
}
