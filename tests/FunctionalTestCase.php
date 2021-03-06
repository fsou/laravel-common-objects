<?php

declare(strict_types=1);

namespace Umbrellio\Common\tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

abstract class FunctionalTestCase extends TestCase
{
    use RefreshDatabase;

    protected function getEnvironmentSetUp($app)
    {
        parent::getEnvironmentSetUp($app);

        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'pgsql',
            'host' => env('TEST_DB_HOST', 'localhost'),
            'port' => env('TEST_DB_PORT', 5432),
            'database' => env('TEST_DB', 'testing'),
            'username' => env('TEST_DB_USER', 'postgres'),
            'password' => env('TEST_DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
        ]);
    }
}
