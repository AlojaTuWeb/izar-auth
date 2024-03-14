<?php

namespace Alojatuweb\IzarAuth\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\File;

class InstallCommand extends Command
{
    protected $signature = 'izar-auth:install';

    protected $description = 'Install the IzarAuthPackage';

    public function handle(): void
    {
        $this->info('Installing Izar Auth...');

        $this->info('Publishing resources...');

        // Controllers...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Controllers'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Http/Controllers', app_path('Http/Controllers'));
        // Requests...
        (new Filesystem)->ensureDirectoryExists(app_path('Http/Requests'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/app/Http/Requests', app_path('Http/Requests'));
        // Views...
        (new Filesystem)->ensureDirectoryExists(resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/views', resource_path('views/auth'));
        // Routes...
        copy(__DIR__.'/../../stubs/routes/auth.php', base_path('routes/auth.php'));
        // Translations...
        (new Filesystem)->ensureDirectoryExists(lang_path());
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/lang', lang_path('auth'));

        $this->info('Installed Izar Auth');
    }
}