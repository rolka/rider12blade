<x-profile-rides-layout :current-tab="$currentTab" :counts="$tabCounts">
    <div class="bg-white rounded-lg shadow p-6">
{{--        <h3 class="text-lg font-medium text-gray-900 mb-4">Some text before</h3>--}}
        @if($currentTab === 'my-rides')
            @include('profile.rides.tabs.my-rides', ['rides' => $myRides])
        @elseif($currentTab === 'past-rides')
            @include('profile.rides.tabs.past-rides', ['rides' => $pastRides])
        @elseif($currentTab === 'cancelled-rides')
            @include('profile.rides.tabs.cancelled-rides', ['rides' => $cancelledRides])
        @elseif($currentTab === 'ride-requests')
            @include('profile.rides.tabs.ride-requests', ['requests' => $rideRequests])
        @endif
{{--        <h3 class="text-lg font-medium text-gray-900 mb-4">Some text after</h3>--}}
    </div>
</x-profile-rides-layout>
