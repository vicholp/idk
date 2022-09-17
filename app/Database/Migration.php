<?php

namespace App\Database;

class Migration
{
    /**
     * Drop all tables and create them again.
     */
    public static function fresh(): void
    {
        self::down();

        self::up();
    }

    /**
     * Execute queries to drop all tables
     */
    public static function down(): void
    {
        /* @phpstan-ignore-next-line */
        (new DB())->execute(file_get_contents(__DIR__.'/sql/down.sql'));
    }

    /**
     * Execute queries to create all tables
     */
    public static function up(): void
    {
        /* @phpstan-ignore-next-line */
        (new DB())->execute(file_get_contents(__DIR__.'/sql/up.sql'));
    }
}
