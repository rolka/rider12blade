@props([
    'ride',
    'text' => '',
])

@php
    use App\Enums\RideStatus;
    $tab = match ($ride->status) {
        RideStatus::Cancelled => 'cancelled-rides',
        RideStatus::Completed => 'past-rides',
        default => 'my-rides',
    };
@endphp

<a href="{{ route('profile.rides.tab.show', ['tab' => $tab, 'ride' => $ride]) }}"
   class="px-4 py-1 bg-button-bg text-button-color text-base rounded-[20px] hover:bg-button-bg-hover hover:text-white">
    {{ $text }}
</a>

