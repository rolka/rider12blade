@props(['ride_data'])

<div class="py-6 text-footer-bg">
    <div class="flex flex-col md:flex-row items-center justify-between">
        <!-- Left section: User info and trip details -->
        <div class="flex items-center space-x-4 flex-1">
            <!-- User Avatar -->
            <div class="flex-shrink-0">
                <img
                    src="{{'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop&crop=face'}}"
                    alt="{{'User Avatar'}}"
                    class="w-24 h-24 rounded-full object-cover border-4 border-frost"
                >
            </div>

            <!-- User details -->
            <div class="flex-1 min-w-0">
                <!-- User name -->
                <h3 class="text-2xl font-bold flex">
                    {{ $ride_data->user->full_name }}
                    <x-ride-rating :rating="4.5"/>
                </h3>
                <!-- Trip route -->
                <div class="flex items-center mt-1">
                                <span class="text-lg font-semibold">
                                    <span>{{ $ride_data->departure->name }}</span>
                                    <x-rider-arrow/>
                                    <span>{{ $ride_data->destination->name }}</span>
                                </span>
                </div>
                <!-- Price -->
                <div class="flex items-center text-lg font-semibold">
                    <span>{{__('general.price')}} {{ $ride_data->formatted_price }}</span>
                </div>
            </div>
        </div>

        <!-- Right section: Message button -->
        <div class="w-full md:w-auto ml-0 md:ml-6 mt-4">
            <x-ride-button :text="__('general.send_message')" small />
        </div>
    </div>
</div>
