<?php

namespace App\Commands;

use App\Services\OpenApiService;

class OpenApiCommand
{
    public function generate(): void
    {
        OpenApiService::generate();
    }
}
