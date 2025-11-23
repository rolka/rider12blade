@props([
    'label' => null,
    'name' => '',
    'type' => 'text',
    'icon' => null,
    'data' => null,
    'selected' => null,
    'optionLabel' => null,
    'optionValue' => null,
])
@if($label)
    <label for="{{ $name }}" class="rider-form-input-label">
        {{ $label ?? __('general.select') }}
    </label>
@endif
<div class="relative">
    {{-- Icon --}}
    <div class="rider-form-input-icon-wrap">
        @if($icon)
            <x-dynamic-component :component="$icon" class="rider-form-input-icon" />
        @else
            <x-phosphor-circle-light class="rider-form-input-icon" />
        @endif
    </div>
    @if($data)
        @php
            $getOptionValue = $optionValue ?: fn($item) => $item->id ?? $item;
            $getOptionLabel = $optionLabel ?: fn($item) => $item->name ?? $item;
        @endphp
        <select
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $attributes->merge(['class' => 'border border-frost bg-input-bg text-light-teal text-base rounded-lg focus:ring-frost focus:border-input-bg block w-full p-2.5 pl-10']) }}
        >
            <option value="" disabled>{{ $label }}</option>
            @foreach($data as $item)
                @php
                    $itemValue = $getOptionValue($item);
                    $itemLabel = $getOptionLabel($item);
                @endphp
                <option value="{{ $itemValue }}">
                    {{ $itemLabel }}
                </option>
            @endforeach
        </select>
    @elseif($type === 'date')
        <div class="hidden">
            <div class="datepicker-grid w-64 grid grid-cols-7"></div>
            <div class="days-of-week grid grid-cols-7 mb-1"></div>
        </div>
        <input id="default-datepicker" type="text" {{ $attributes->merge(['class' => 'rider-form-input-item']) }} placeholder="{{ __('form.date') }}">
    @elseif( $type === 'time' )
        <input type="time" id="{{ $name }}" {{ $attributes->merge(['class' => 'rider-form-input-item']) }} value="00:00" />
    @else
        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            {{ $attributes->merge(['class' => 'rider-form-input-item']) }}
        >
    @endif
</div>
@error($name)
<p class="mt-1 mb-4 pl-0 md:pl-2 text-sm text-red-600">
    <span class="font-medium">{{ $message }}</span>
</p>
@enderror
