<?php

namespace ManeOlawale\Laravel\Package;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the provider
     *
     * @return void
     */
    public function boot()
    {
        $this->addPublishes();
        $this->addCommands();
    }

    /**
     * Register publishable assets
     *
     * @return void
     */
    public function addPublishes()
    {
        $this->publishes([
            __DIR__ . '/../config/package.php' => App::configPath('package.php')

        ], 'package.config');
    }

    /**
     * Add Package commands
     *
     * @return void
     */
    protected function addCommands()
    {
        // Console only commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\InstallCommand::class,
            ]);
        }
    }
}
