<x-main-layout title="My rides">
    {{--todo: fix layout on desktop and mobile--}}
    <div class="max-w-7xl mx-auto py-6 sm:px-4 sm:px-6 lg:px-8 sm:mt-10">
        <div class="mb-8">
            <div class="flex flex-col md:flex-row">
                <!-- Sidebar -->
                <div class="w-full md:w-64 bg-white sm:border sm:border-frost sm:shadow-[5px_5px_4px_0px_#C4D4D680] sm:rounded-[20px]">
                    <div class="px-2 py-4">
                        {{-- USE THE COMPONENT HERE - This is the magic! --}}
                        <x-ride-tabs :current-tab="$currentTab" :counts="$tabCounts" />
                    </div>
                </div>
                <!-- Main Content -->
                <div class="flex-1 flex flex-col">
                    <!-- Main Content Area todo: fix padding below -->
                    <main class="flex-1 p-6 overflow-y-auto">
                        <div class="bg-white rounded-lg shadow p-6">
{{--                            <h3 class="text-lg font-medium text-gray-900 mb-4">Some text before</h3>--}}
                            @if($currentTab === 'my-rides')
                                @include('profile.rides.tabs.my-rides', ['rides' => $myRides])
                            @elseif($currentTab === 'past-rides')
                                @include('profile.rides.tabs.past-rides', ['rides' => $pastRides])
                            @elseif($currentTab === 'cancelled-rides')
                                @include('profile.rides.tabs.cancelled-rides', ['rides' => $cancelledRides])
                            @elseif($currentTab === 'ride-requests')
                                @include('profile.rides.tabs.ride-requests', ['requests' => $rideRequests])
                            @endif
{{--                            <h3 class="text-lg font-medium text-gray-900 mb-4">Some text after</h3>--}}
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
