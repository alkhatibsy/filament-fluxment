@php
    use Illuminate\View\ComponentAttributeBag;
    $options = $getOptions();
    $extraInputAttributeBag = $getExtraInputAttributeBag();
    $id = $getId();
    $isDisabled = $isDisabled();
    $statePath = $getStatePath();
    $wireModelAttribute = $applyStateBindingModifiers('wire:model');
    $attributes = $getExtraAttributeBag()->merge(
        [
            $wireModelAttribute => $statePath,
        ],
        escape: false,
    );
@endphp

<flux:radio.group :indicator="$getIndicator()" :variant="$getVariant()" :size="$getSize()" {{ $attributes }}
    label="{{ $getLabel() }}">
    @foreach ($options as $key => $value)
        @php
            $attributes = $getExtraAttributeBag()->merge(
                [
                    'autofocus' => $loop->first && $isAutofocused(),
                    'name' => $id,
                    'disabled' => $isDisabled || $isOptionDisabled($key, $value),
                    'value' => e($key),
                    'label' => e($value),
                    'description' => e($getDescription($key)),
                    'icon' => e($getIcon($key)),
                ],
                escape: false,
            );
        @endphp
        <flux:radio {{ $attributes }} />
    @endforeach
</flux:radio.group>
