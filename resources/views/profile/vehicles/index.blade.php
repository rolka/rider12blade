<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8 px-8">
            <div class="grid grid-cols-4 gap-4">
                @foreach($vehicles as $vehicle)
{{--                    <a href="{{ route('profile.vehicles.show', $vehicle) }}">--}}
                        <div class="bg-white shadow-lg rounded-lg p-4 mb-5">
                            <p class="font-semibold mb-1">
                                {{ $vehicle->user->first_name }}
                            </p>
                            <p class="mb-1">
                                {{ $vehicle->make->name }}
                                {{ $vehicle->model->name }}
                                {{ $vehicle->make_year }},
                                {{ $vehicle->color->name }}
                            </p>
                            <p class="mb-2">
                                <a href="{{ route('profile.vehicles.edit', $vehicle) }}">Edit</a>
                            </p>
                            @if($vehicle->photo)
{{--                                <img src="{{ $vehicle->photo }}" alt="Photo" class="w-full h-48 object-cover rounded">--}}
                                <img src="{{ asset('storage/' . $vehicle->photo) }}" alt="Photo" class="w-full h-48 object-cover rounded" >
                            @endif
                        </div>
{{--                    </a>--}}
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
