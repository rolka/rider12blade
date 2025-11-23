@props([
    'label' => null,
    'name' => '',
    'checked' => false,
    'value' => '1',
    'icon' => null,
])

<div class="flex items-center mb-4">
    <input
        id="{{ $name }}"
        name="{{ $name }}"
        type="checkbox"
        value="{{ $value }}"
        @checked(old($name, $checked))
{{--        style="border-color: var(--frost, #3b82f6) !important;"--}}
        {{ $attributes->merge(['class' => 'w-4 h-4 text-[var(--color-button-color)] border-[var(--color-button-color)] rounded-xs bg-white checked:bg-[var(--color-button-color)] checked:border-[var(--color-button-color)] focus:ring-2 focus:ring-frost']) }}
    >
    @if($icon)
        <x-dynamic-component :component="$icon" class="w-5 h-5 text-light-teal ml-2" />
    @endif
    @if($label)
        <label for="{{ $name }}" class="select-none ml-2 text-sm font-medium text-light-teal">
            {{ $label }}
        </label>
    @endif
</div>

@error($name)
<p class="mt-1 mb-4 text-sm text-red-600">
    <span class="font-medium">{{ $message }}</span>
</p>
@enderror
