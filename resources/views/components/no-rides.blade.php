<div class="text-center">
    <img src="{{ $image ?? asset('images/content/no-rides.png') }}" alt="" class="block mx-auto">

    <p class="mt-6 text-2xl font-bold">{{ $title ?? __('general.have_no_rides') }}</p>
    <p class="mt-4">{{ $subtitle ?? __('general.rides_and_requests_overview') }}</p>

    @php
        $defaultActions = [
            ['url' => route('profile.rides.create'), 'label' => __('general.find_ride')],
            ['url' => route('profile.rides.create'), 'label' => __('general.add_ride')]
        ];
        $finalActions = $actions ?? $defaultActions;
    @endphp
    @if(!empty($finalActions))
        <div class="flex justify-center items-center gap-4 mt-6">
            @foreach($finalActions as $action)
                <a href="{{ $action['url'] }}" class="{{ $action['class'] ?? 'btn-styles' }}">
                    {{ $action['label'] }}
                </a>
                @if(!$loop->last)
                    <span>{{ __('general.or') }}</span>
                @endif
            @endforeach
        </div>
    @endif
</div>
