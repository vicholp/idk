<?php

namespace App\Commands;

use App\Database\Migration;

class DatabaseCommand
{
    public function migrateFresh(): void
    {
        Migration::fresh();
    }
}
