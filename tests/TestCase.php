<?php

namespace Swandam\Core\Tests;

use Swandam\Core\SwandamServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    public function setUp(): void
    {
        parent::setUp();
        // additional setup
    }

    public function getPackageProviders($app)
    {
        return [
            SwandamServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
    }
}