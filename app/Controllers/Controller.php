<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Base controller class that provides useful methods.
 *
 * All controllers should extend this class.
 */
class Controller
{
    /**
     * Create a new JsonResponse from the array.
     *
     * @param array $data Array to be converted
     */
    protected static function json(array $data, int $code = 200): JsonResponse
    {
        return new JsonResponse($data, $code);
    }

    /**
     * Create a new Response with a OK message.
     */
    protected static function ok(): Response
    {
        return new Response('OK', 200);
    }

    /**
     * Create a new Response with the content of the passed view.
     *
     * @param string $view   name of the view to be rendered
     * @param array  $params array of parameters to be passed to the view
     */
    protected static function view(string $view, array $params = [], int $code = 200): Response
    {
        ob_start();

        foreach ($params as $key => $p) {
            $$key = $p;
        }

        include '../app/Resources/php/'.$view.'.php';

        // @phpstan-ignore-next-line
        return new Response(ob_get_clean(), $code);
    }
}
