<?php

namespace App\Providers;

use Illuminate\Foundation\Console\ServeCommand;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Laravel's serve command filters environment variables when auto-reloading.
        // On Windows the OS exposes "SystemRoot" (not "SYSTEMROOT"), so we need to
        // explicitly pass it through or the PHP dev server cannot bind to a port.
        if (\PHP_OS_FAMILY === 'Windows') {
            ServeCommand::$passthroughVariables[] = 'SystemRoot';
            ServeCommand::$passthroughVariables[] = 'windir';
        }
    }
}
