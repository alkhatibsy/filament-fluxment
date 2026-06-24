<?php

declare(strict_types=1);

namespace Syriable\Filament\Plugins\Fluxment;

use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Syriable\Filament\Plugins\Fluxment\Testing\TestsFluxment;

class FluxmentServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-fluxment';

    public static string $viewNamespace = 'filament-fluxment';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name);

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void {}

    public function packageBooted(): void
    {
        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__.'/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/filament-fluxment/{$file->getFilename()}"),
                ], 'filament-fluxment-stubs');
            }
        }

        // Testing
        Testable::mixin(new TestsFluxment);

        FilamentAsset::register([
            Js::make('filament-fluxment', __DIR__.'/../resources/js/index.js'),
        ]);
    }
}
