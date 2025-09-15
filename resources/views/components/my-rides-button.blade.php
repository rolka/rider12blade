@props([
    'ride',
    'text' => '',
])

<a href="{{ route('profile.rides.show', $ride) }}"
   class="px-4 py-1 bg-button-bg text-button-color text-base rounded-[20px] hover:bg-button-bg-hover hover:text-white">
    {{ $text }}
</a>

