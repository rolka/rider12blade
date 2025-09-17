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

    $showUrl = match ($tab) {
        'cancelled-rides' => route('profile.rides.cancelled.show', $ride),
        'past-rides' => route('profile.rides.completed.show', $ride),
        default => route('profile.rides.show', $ride),
    };
@endphp

<a href="{{ $showUrl }}"
   class="px-4 py-1 bg-button-bg text-button-color text-base rounded-[20px] hover:bg-button-bg-hover hover:text-white">
    {{ $text }}
</a>

