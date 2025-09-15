<div class="bg-white mb-6 shadow rounded-lg p-4 flex flex-col space-y-2">
    <div class="flex justify-between items-start">
        <div>
            <div class="font-semibold text-lg mb-2">
                <p>{{ $ride->departure->name }} → {{ $ride->destination->name }}</p>
            </div>
            <div class="text-sm text-gray-600 mb-3">
                <p>{{ $ride->date_time->isoFormat('D MMMM YYYY, H:m ') }}</p>
            </div>
            <div class="">
                <div class="btn-like-styles">
                    <span>{{ __('general.driver') }}</span>
                </div>
            </div>
        </div>
        <div class="flex">
            <x-my-rides-button :ride="$ride" :text="__('general.view_ride')" />
        </div>
    </div>
</div>
