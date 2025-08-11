<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto lg:px-8 px-8">
            @if (session('success'))
                <div class="flex items-center justify-between mb-4 p-4 text-sm text-green-800 bg-green-100 rounded" role="alert">
                    <span>{{ session('success') }}</span>
                    <button type="button" onclick="this.parentElement.remove()" class="text-green-800 hover:text-green-900">
                        &times;
                    </button>
                </div>
            @endif
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

                            <form action="{{ route('profile.vehicles.destroy', $vehicle) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this vehicle?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Remove</button>
                            </form>


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
