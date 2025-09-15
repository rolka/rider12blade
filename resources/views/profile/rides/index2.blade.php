<x-main-layout title="My rides">
    <div class="max-w-7xl mx-auto py-6 sm:px-4 sm:px-6 lg:px-8 sm:mt-10">
        <div class="mb-8">
            <div class="flex">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2>My Rides</h2>

                            {{-- USE THE COMPONENT HERE - This is the magic! --}}
                            <x-ride-tabs :current-tab="$currentTab" :counts="$tabCounts" />

                            {{-- Tab Content --}}
                            <div class="tab-content">
                                @if($currentTab === 'my-rides')
                                    @include('profile.rides.tabs.my-rides', ['rides' => $myRides])

                                @elseif($currentTab === 'past-rides')
                                    @include('profile.rides.tabs.past-rides', ['rides' => $pastRides])

                                @elseif($currentTab === 'cancelled-rides')
                                    @include('profile.rides.tabs.cancelled-rides', ['rides' => $cancelledRides])

                                @elseif($currentTab === 'ride-requests')
                                    @include('profile.rides.tabs.ride-requests', ['requests' => $rideRequests])
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
