<?php

namespace PulledP0rk\ForceDarkMode;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Illuminate\Support\Facades\Blade;

class ForceDarkModePlugin implements Plugin
{
    public function getId(): string
    {
        return 'force-dark-mode';
    }

    public function register(Panel $panel): void
    {
        // Inject JavaScript to force dark mode on all panels
        FilamentView::registerRenderHook(
            'panels::body.start',
            fn (): string => Blade::render('force-dark-mode::force-dark-mode-script'),
        );
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
