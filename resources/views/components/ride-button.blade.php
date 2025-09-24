@php use Illuminate\Support\Arr; @endphp
@props([
    'text' => '',
    'danger' => false,
    'href' => null,
    'small' => null,
])
@php
    $baseClasses = Arr::toCssClasses([
        'block w-full bg-button-bg hover:bg-button-bg-hover hover:text-white cursor-pointer text-button-color rounded-2xl mb-2 text-center',
        'bg-danger-btn-bg text-danger-btn-color hover:bg-danger-btn-bg-hover' => $danger,
        'px-6 py-2 text-base font-normal' => $small,
        'px-2 py-4 text-lg font-semibold' => ! $small,
    ]);
@endphp

@if ($href)

    <a href="{{ $href }}" {{ $attributes->class($baseClasses) }}>
        {{ $text }}
    </a>
@else
    <button type="button" {{ $attributes->class($baseClasses) }}>
        {{ $text }}
    </button>
@endif
