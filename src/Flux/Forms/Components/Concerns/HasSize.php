<?php

namespace Syriable\Filament\Plugins\Fluxment\Flux\Forms\Components\Concerns;

use Closure;

trait HasSize
{
    protected string|Closure|null $size = null;

    public function size(string $size): static
    {
        $this->size = $size;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->evaluate($this->size);
    }
}
