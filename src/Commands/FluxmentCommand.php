<?php

declare(strict_types=1);

namespace Syriable\Filament\Plugins\Fluxment\Commands;

use Illuminate\Console\Command;

class FluxmentCommand extends Command
{
    public $signature = 'filament-fluxment';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
