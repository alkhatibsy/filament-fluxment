<?php

namespace Syriable\Filament\Plugins\Fluxment\Flux\Forms\Components;

use Closure;
use Filament\Forms\Components\Concerns\HasIcons;
use Filament\Forms\Components\Radio as BaseRadio;

class Radio extends BaseRadio
{
    use Concerns\HasSize;
    use HasIcons;

    protected string $view = 'filament-fluxment::flux.forms.components.radio';

    protected string|Closure|null $variant = null;

    protected bool $indicator = true;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function variant(string $variant): static
    {
        $this->variant = $variant;

        return $this;
    }

    public function getVariant(): ?string
    {
        return $this->evaluate($this->variant);
    }

    public function indicator(bool $indicator): static
    {
        $this->indicator = $indicator;

        return $this;
    }

    public function getIndicator(): bool
    {
        return $this->evaluate($this->indicator);
    }
}
