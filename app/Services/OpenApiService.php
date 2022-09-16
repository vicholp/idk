<?php

namespace App\Services;

use OpenApi\Attributes as OA;

#[OA\Info(title: 'Loggger API', version: '0.1')]
class OpenApiService
{
    public static function generate(): string
    {
        $openapi = (new \OpenApi\Generator())->generate([__DIR__.'/..']);

        if (!$openapi) {
            return '';
        }

        return $openapi->toYaml();
    }
}
