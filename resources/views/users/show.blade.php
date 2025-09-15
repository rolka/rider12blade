<x-main-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-4 sm:px-6 lg:px-8 sm:mt-10">
        <div class="mb-8">
            <div class="bg-white p-6 sm:border sm:border-frost sm:shadow-[5px_5px_4px_0px_#C4D4D680] sm:rounded-[20px]">
                <div class="flex items-center justify-between">
                    <div>
                        <img src="{{ $user->photo }}" alt="{{ $user->full_name }}" class="w-20 h-20 rounded-full object-cover">
                        <h2 class="mt-2 text-2xl text-deep-teal font-bold">{{ $user->full_name }}</h2>
                        <div class="flex items-center gap-1">
                            <x-phosphor-star-fill class="w-4 h-4 text-steel-teal" />
                            <span class="text-sm text-ash-gray">5,0</span>
                        </div>
                    </div>
                </div>
                <hr class="text-frost mt-6 mb-6">
                <div class="flex md:flex-row flex-col gap-6 items-start">
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-4">
                            <x-phosphor-user-light class="text-deep-teal w-6 h-6"/>

                            <span>{{ __('general.joined_on') }} {{ $user->created_at->isoFormat('YYYY MMMM D') }}</span>
                        </div>
{{--                        <div class="flex items-center gap-2 mb-4">--}}
{{--                            <x-phosphor-map-pin-simple-area-light class="text-deep-teal w-6 h-6" />--}}
{{--                            <p>Iš Klaipėdos</p>--}}
{{--                        </div>--}}
                        <div class="flex items-center gap-2">
                            <x-phosphor-car-light class="text-deep-teal w-6 h-6" />
                            <p>{{ __('general.total_trips') }}: {{ $user->rides->count() }}</p>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h2 class="font-semibold text-deep-teal text-xl mb-4">{{ __('general.confirmed_information') }}</h2>
                        <div class="flex items-center gap-2 mb-4">
                            @if($user->email_verified_at)
                                <x-phosphor-check-light class="w-6 h-6 text-dusty-teal" />
                            @else
                                <x-phosphor-warning-circle-light class="w-6 h-6 text-warning-red" />
                            @endif
                            <p>{{ __('general.email') }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            @if($user->phone_verified_at)
                                <x-phosphor-check-light class="w-6 h-6 text-frost" />
                            @else
                                <x-phosphor-warning-circle-light class="w-6 h-6 text-warning-red" />
                            @endif
                            <p>{{ __('general.phone') }}</p>
                        </div>
                    </div>
                </div>
                <hr class="text-frost mt-6 mb-6">
                {{--todo: rating--}}
            </div>
        </div>
    </div>
</x-main-layout>
