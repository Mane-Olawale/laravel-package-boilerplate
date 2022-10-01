<?php

namespace ManeOlawale\Laravel\Package\Tests;

use ManeOlawale\Laravel\Package\PackageServiceProvider;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestBench extends BaseTestCase
{
    use MockeryPHPUnitIntegration;

    protected function getEnvironmentSetUp($app)
    {
        putenv('YOUR_ENV_KEY=default');
        $config = require __DIR__ . '/../config/package.php';

        $app['config']->set('package', $config);
        $app['request']->setLaravelSession($app['session.store']);
    }

    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            // Register your providers here
            PackageServiceProvider::class
        ];
    }
}
