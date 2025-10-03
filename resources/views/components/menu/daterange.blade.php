@props([
    'label' => null,
    'icon' => 'Calendar',
    'name' => 'daterange',
    'id' => null,
    'placeholder' => '',
    'value' => null,
    'showIcon' => true,
    'disabled' => false,
    'readonly' => false,
    'wrapperClass' => '',
    'wireModel' => null,
])

@php
    $inputId = $id ?? $name;
    $toBool = function ($value) {
        return is_bool($value) ? $value : filter_var($value, FILTER_VALIDATE_BOOLEAN);
    };
    $isDisabled = $toBool($disabled);
    $isReadonly = $toBool($readonly);
    $showIconBool = $toBool($showIcon);
@endphp

<div class="{{ $wrapperClass }}">
    @if($label)
        <label for="{{ $inputId }}" class="mb-2 block text-sm font-medium text-foreground">{{ $label }}</label>
    @endif
    <div class="flex items-stretch gap-2">
        @if($showIconBool)
            <div class="bg-(--color)/[.03] border-(--color)/[.08] text-(--color)/70 flex items-center justify-center border px-5 [--color:var(--color-foreground)]">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                    <line x1="16" y1="2" x2="16" y2="6"></line>
                    <line x1="8" y1="2" x2="8" y2="6"></line>
                    <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
            </div>
        @endif
        <input
            type="date"
            name="{{ $name }}"
            id="{{ $inputId }}"
            placeholder="{{ $placeholder }}"
            value="{{ $value }}"
            class="h-10 rounded-md border bg-background px-3 py-2 ring-offset-background placeholder:text-foreground/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 box w-full"
            @if($isDisabled) disabled @endif
            @if($isReadonly) readonly @endif
            @if($wireModel) wire:model.live="{{ $wireModel }}" @endif
        />
    </div>
    @isset($slot)
        <div class="mt-2">{{ $slot }}</div>
    @endisset
</div>