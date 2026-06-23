<?php

declare(strict_types=1);

namespace Syriable\Filament\Plugins\Fluxment\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Syriable\Filament\Plugins\Fluxment\Fluxment
 */
class Fluxment extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Syriable\Filament\Plugins\Fluxment\Fluxment::class;
    }
}
