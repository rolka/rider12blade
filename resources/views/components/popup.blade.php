@props([
    'title' => __('general.have_no_rides'),
    'subtitle' => __('general.rides_and_requests_overview'),
    'image' => asset('images/content/no-rides.png'),
    'actions' => [
        ['url' => route('profile.rides.create'), 'label' => __('general.find_ride')],
        ['url' => route('profile.rides.create'), 'label' => __('general.add_ride')],
    ],
])

<div class="max-w-7xl mx-auto py-6 sm:px-4 sm:px-6 lg:px-8 sm:mt-10">
    <div class="bg-white p-6 sm:border sm:border-frost sm:shadow-[5px_5px_4px_0px_#C4D4D680] sm:rounded-[20px]">
        <div class="text-center">
            <img src="{{ $image }}" alt="" class="block mx-auto">
            <p class="mt-6 text-2xl font-bold">{{ $title }}</p>
            @if ($subtitle)
                <p class="mt-4">{{ $subtitle }}</p>
            @endif
            {{ $slot }}
            @if ($actions)
                <div class="flex justify-center items-center gap-4 mt-6">
                    @foreach ($actions as $action)
                        <a href="{{ $action['url'] }}" class="{{ $action['class'] ?? 'btn-styles' }}">
                            {{ $action['label'] }}
                        </a>
                        @if (! $loop->last)
                            <span>{{ __('general.or') }}</span>
                        @endif
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
