@props([
    'hoverEffect' => true, // Enable/disable hover effect on rows
    'tableClass' => '', // Additional classes for the table wrapper
    'theadClass' => '', // Additional classes for thead
    'tbodyClass' => '', // Additional classes for tbody
    'rowClass' => '', // Additional classes for table rows
    'wrapperClass' => '', // Additional classes for wrapper div
])

@php
    $hoverClass = $hoverEffect ? '[&:hover>td]:before:bg-accent [&:hover>td]:relative [&:hover>td]:before:absolute [&:hover>td]:before:inset-0 [&:hover>td]:before:z-[-1] [&:hover>td]:before:blur-lg' : '';
@endphp

{{-- 
    Usage Example:
    
    <x-menu.regular-table hoverEffect="true">
        <x-slot:thead>
            <tr>
                <th>#</th>
                <th>Name</th>
            </tr>
        </x-slot:thead>
        <x-slot:tbody>
            <tr class="{{ $hoverClass }}">
                <td>1</td>
                <td>John</td>
            </tr>
        </x-slot:tbody>
    </x-menu.regular-table>
    
    Or use default slot for full control:
    
    <x-menu.regular-table>
        <thead>
            ...
        </thead>
        <tbody>
            ...
        </tbody>
    </x-menu.regular-table>
--}}

@if(!empty($wrapperClass))
<div class="{{ $wrapperClass }}">
@endif
    <div class="{{ $tableClass }}">
        <table class="w-full caption-bottom border-separate border-spacing-y-[10px]">
            @if(isset($thead))
            <thead class="{{ $theadClass }}">
                {{ $thead }}
            </thead>
            @endif

            @if(isset($tbody))
            <tbody class="{{ $tbodyClass }}">
                {{ $tbody }}
            </tbody>
            @endif

            @if(!isset($thead) && !isset($tbody))
            {{ $slot }}
            @endif
        </table>
    </div>
@if(!empty($wrapperClass))
</div>
@endif