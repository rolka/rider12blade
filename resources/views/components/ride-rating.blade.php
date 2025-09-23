@props([
    'rating' => null,
])

<span class="inline-flex items-center ml-2">
    <x-phosphor-star-fill class="w-[13px] h-[13px] text-steel-teal inline-block"/>
    @if ($rating)
        <span class="text-sm font-semibold text-light-teal">{{ $rating }}</span>
    @endif
</span>
