# This is my package filament-fluxment

[![Latest Version on Packagist](https://img.shields.io/packagist/v/syriable/filament-fluxment.svg?style=flat-square)](https://packagist.org/packages/syriable/filament-fluxment)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/syriable/filament-fluxment/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/syriable/filament-fluxment/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/syriable/filament-fluxment/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/syriable/filament-fluxment/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/syriable/filament-fluxment.svg?style=flat-square)](https://packagist.org/packages/syriable/filament-fluxment)



This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require syriable/filament-fluxment
```

> [!IMPORTANT]
> If you have not set up a custom theme and are using Filament Panels follow the instructions in the [Filament Docs](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) first.

After setting up a custom theme add the plugin's views to your theme css file or your app's css file if using the standalone packages.

```css
@source '../../../../vendor/syriable/filament-fluxment/resources/**/*.blade.php';
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-fluxment-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="filament-fluxment-config"
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="filament-fluxment-views"
```

This is the contents of the published config file:

```php
return [
];
```

## Components

### Radio

A drop-in replacement for Filament's native `Radio` form field that renders with [Flux UI](https://fluxui.dev)'s `<flux:radio.group>`. It extends `Filament\Forms\Components\Radio`, so every method you already know (`options()`, `descriptions()`, `default()`, `disableOptionWhen()`, validation, etc.) keeps working, while adding Flux-specific styling options.

```php
use Syriable\Filament\Plugins\Fluxment\Flux\Forms\Components\Radio;

Radio::make('status')
    ->label('Status')
    ->options([
        'draft' => 'Draft',
        'published' => 'Published',
        'archived' => 'Archived',
    ])
    ->descriptions([
        'draft' => 'Only visible to you.',
        'published' => 'Visible to everyone.',
    ])
    ->icons([
        'draft' => 'pencil-square',
        'published' => 'globe-alt',
        'archived' => 'archive-box',
    ])
    ->variant('segmented')
    ->size('sm')
    ->indicator(false)
    ->default('draft');
```

#### Available methods

In addition to all inherited `Radio` methods, the following are available:

| Method | Type | Default | Description |
| --- | --- | --- | --- |
| `variant(string $variant)` | `string` | `default` | The Flux radio group variant, e.g. `default`, `segmented`, or `cards`. Accepts a closure. |
| `size(string $size)` | `string` | `null` | The Flux control size, e.g. `sm` or `base`. Accepts a closure. |
| `indicator(bool $indicator)` | `bool` | `true` | Whether to render the selection indicator. Set to `false` for a cleaner look with the `segmented`/`cards` variants. |
| `icons(array $icons)` | `array` | `[]` | Per-option icons, keyed by option value (provided by Filament's `HasIcons`). |

> [!NOTE]
> `variant` and `size` values are passed straight through to Flux. The variants available to you (such as `segmented` and `cards`) depend on your Flux edition — see the [Flux radio documentation](https://fluxui.dev/components/radio) for the full list.

## Usage

Register the plugin on your Filament panel to wire up Flux's appearance and scripts:

```php
use Syriable\Filament\Plugins\Fluxment\FluxmentPlugin;

$panel->plugin(FluxmentPlugin::make());
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](.github/SECURITY.md) on how to report security vulnerabilities.

## Credits

- [syriable](https://github.com/syriable)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
