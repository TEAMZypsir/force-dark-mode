<?php

namespace PulledP0rk\ForceDarkMode\Providers;

use Illuminate\Support\ServiceProvider;

class ForceDarkModeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Register views
        $this->loadViewsFrom(
            plugin_path('force-dark-mode', 'resources/views'),
            'force-dark-mode'
        );
    }
}
