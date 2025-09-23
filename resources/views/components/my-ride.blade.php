<section class="flex">
    <div class="flex-1 mx-6 py-6">
        {{-- Ride route --}}
        <h2 class="font-bold text-footer-bg text-2xl mb-2">
            {{ $ride->departure->name }} → {{ $ride->destination->name }}
        </h2>
        {{-- Date/Time --}}
        <p class="text-base mb-3">
            {{ $ride->date_time->isoFormat('D MMMM YYYY, H:mm') }}
        </p>
        <hr class="hr-styles -mx-6">
        {{-- Only for the ride owner --}}
        @if ($ride->user->is(auth()->user()))
            {{-- Driver badge (hidden by default, why?) --}}
            <div class="px-6 hidden">
                <span class="btn-like-styles">({{ __('general.driver') }})</span>
            </div>
            {{-- Passengers/ Rider section --}}
            {{--
            Todo: If it's driver- loops through passengers
            Todo: If it's passenger- show driver card/ info
            --}}
            <h3 class="text-2xl font-bold mt-4">{{ __('general.passengers') }}</h3>
            <x-ride-passenger-driver-card :ride_data="$ride" />


            {{-- Earnings section --}}
            <section class="mt-6">
                <h3 class="text-2xl font-bold mb-6">{{ __('general.your_earnings') }}</h3>
                <div class="flex items-center justify-between text-light-teal">
                    <p class="font-semibold text-lg">{{ __('general.trip_price_all_passengers') }}</p>
                    <p>{{ $ride->formatted_price }}</p>
                </div>
                <hr class="hr-styles my-6">
                <div class="flex items-center justify-between text-light-teal">
                    <p class="font-semibold text-lg">{{ __('general.service_fee') }}</p>
                    <p>1,8 EUR</p>
                </div>
                <hr class="hr-styles my-6">
                <div class="flex items-center justify-between text-footer-bg">
                    <p class="font-bold text-2xl">{{ __('general.total_earnings') }}</p>
                    <p>13,2 EUR</p>
                </div>
            </section>
            {{-- Action buttons --}}
            <div class="mt-6 space-x-2">
                <x-ride-button href="{{ route('profile.rides.edit', $ride) }}" :text="__('general.edit_ride')" />
                <x-ride-button :text="__('general.copy_ride')" />
                <x-ride-button :text="__('general.report_problem')" href="{{ route('home') }}" />
                <x-ride-button
                               :text="__('general.cancel_ride')" danger
                               id="cancelRideBtn"
                />
            </div>
        @endif
    </div>
</section>

<script>
    document.getElementById('cancelRideBtn').addEventListener('click', function (e) {
        e.preventDefault();
        if (!confirm("{{ __('general.are_you_sure_cancel') }}")) return;

        fetch("{{ route('profile.rides.cancel', $ride) }}", {
            method: "PATCH", // or DELETE
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Accept": "application/json",
                "Content-Type": "application/json"
            },
            credentials: "same-origin" // 🔑 sends cookies (session)
        })
            .then(res => res.json())
            .then(data => {
                // Update UI (e.g., disable button, show "Cancelled")
                document.getElementById('cancelRideBtn').innerText = "Cancelled";
                document.getElementById('cancelRideBtn').disabled = true;
            })
            .catch(err => console.error(err));
    });
</script>
