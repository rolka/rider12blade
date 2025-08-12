@props([
    'type' => 'button',
    'onclick' => '',
    'icon' => null
])

<button type="{{ $type }}"
        @if($onclick) onclick="{{ $onclick }}" @endif
        class="flex rounded-[20px] justify-center w-full font-medium text-base px-5 py-4 text-center inline-flex items-center me-2 mb-6 cursor-pointer border border-steel-teal text-steel-teal bg-white
        hover:bg-steel-teal hover:text-white
        active:bg-white active:border-deep-teal active:text-deep-teal
        focus:bg-steel-teal focus:text-white
        disabled:bg-frost disabled:text-shadow-light"
>
    @if($icon)
        <x-dynamic-component :component="$icon" class="w-5 h-5 ms-2 mr-2" />
    @endif
    {{ $slot }}
</button>
