@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-sm text-deep-teal']) }}>
    {{ $value ?? $slot }}
</label>
