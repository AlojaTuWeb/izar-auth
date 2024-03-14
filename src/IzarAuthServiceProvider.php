<?php

namespace Alojatuweb\IzarAuth;

use Alojatuweb\IzarAuth\Console\InstallCommand;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;
use function Orchestra\Testbench\artisan;

class IzarAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }

        AboutCommand::add('Izar Auth', fn () => ['Version' => '1.0.0']);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }
}