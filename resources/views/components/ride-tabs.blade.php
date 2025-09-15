@props(['currentTab' => 'my-rides', 'counts' => []])

@php
    // Define all the tabs with their properties
    $tabs = [
        'my-rides' => [
            'label' => __('general.my_rides'),
            'icon' => 'phosphor-user-light',
            'badge' => $counts['my_rides'] ?? null,
            'badge_class' => 'bg-primary'
        ],
        'past-rides' => [
            'label' => __('general.past_rides'),
            'icon' => 'phosphor-check-light',
            'badge' => $counts['past_rides'] ?? null,
            'badge_class' => 'bg-success'
        ],
        'cancelled-rides' => [
            'label' => __('general.cancelled_rides'),
            'icon' => 'phosphor-x-circle-light',
            'badge' => $counts['cancelled_rides'] ?? null,
            'badge_class' => 'bg-danger'
        ],
        'ride-requests' => [
            'label' => __('general.ride_requests'),
            'icon' => 'phosphor-bell-ringing-light',
            'badge' => $counts['ride_requests'] ?? null,
            'badge_class' => 'bg-warning'
        ]
    ];
@endphp

<ul class="nav nav-tabs mb-4">
    @foreach($tabs as $key => $tab)
        <li class="nav-item">
            <a class="nav-link flex items-center gap-2 px-3 py-4 mb-2 text-base font-semibold hover:text-deep-teal rounded-[15px] {{ $currentTab === $key ? 'active bg-[#C3E2E6]' : 'hover:bg-frost' }}"
               href="{{ route('profile.rides.index', ['tab' => $key]) }}">

                {{-- Display the icon --}}
                <x-dynamic-component :component="$tab['icon']" class="w-5 h-5 flex-shrink-0" />

                {{-- Display the label --}}
                <span class="flex-1">
                    {{ $tab['label'] }}
                </span>

                {{-- Display badge if there's a count --}}
                @if($tab['badge'] && $tab['badge'] > 0)
                    <span class="{{ $tab['badge_class'] }} inline-flex items-center justify-center w-5 h-5 ms-2 text-xs font-semibold text-[#3FA0AF] rounded-full flex-shrink-0">
                        {{--bg-[#3FA0AF]--}}
                        {{ $tab['badge'] }}
                    </span>
                @endif
            </a>
        </li>
    @endforeach
</ul>
