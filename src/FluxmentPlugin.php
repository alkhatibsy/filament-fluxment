<?php

namespace Syriable\Filament\Plugins\Fluxment;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\Facades\Blade;

class FluxmentPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-fluxment';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->discoverPages(in: __DIR__.'/../resources/pages', for: 'Syriable\\Filament\\Plugins\\Fluxment\\Pages');
    }

    public function boot(Panel $panel): void
    {
        FilamentView::registerRenderHook(
            PanelsRenderHook::HEAD_END,
            fn (): string => Blade::render('@fluxAppearance()'),
        );
        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_END,
            fn (): string => Blade::render('@fluxScripts()'),
        );
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
