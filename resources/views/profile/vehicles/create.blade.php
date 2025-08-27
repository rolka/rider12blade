<x-main-layout title="Create a Vehicle">
    <section class="relative bg-cover bg-center bg-no-repeat"
             style="background-image: url({{ asset('images/content/bg-image-1.png') }});">
        <div class="bg-black/50 absolute inset-0 z-0"></div>
        <div class="container mx-auto px-4 py-24 relative z-10">
            <div class="text-white max-w-screen-xl mx-auto">
                <h1 class="text-4xl font-bold mb-4">Pridėti automobilį</h1>
{{--                <p class="text-lg">Pridėti automobilį</p>--}}
            </div>
        </div>
    </section>

    <section class="bg-frost">
        <div class="py-12 mx-auto max-w-screen-xl">
            <div class="py-12">
                <form action="{{ $vehicle->exists ? route('profile.vehicles.update', $vehicle) : route('profile.vehicles.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if($vehicle->exists)
                        @method('PUT')
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Whoops!</strong>
                            <span class="block sm:inline">There were some problems with your input.</span>
                            <ul class="mt-3 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="flex gap-8">
                        <div class="w-2/3 bg-white border border-frost shadow-[5px_5px_4px_0px_#C4D4D680] rounded-[20px] px-4 py-4 rounded-lg mb-5">
                            <h2 class="text-2xl font-bold text-deep-teal">
                                {{ $vehicle->exists ? __('vehicle.info_title_update') : __('vehicle.info_title') }}
                            </h2>
                            <div class="mb-4 mt-8">
                                <label for="make" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('vehicle.make_label') }}
                                </label>
                                <select name="make" id="make" class="bg-white border border-frost text-ash-gray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('make') border-red-500 @enderror" required>
                                    <option value="">{{ __('vehicle.make_label') }}</option>
                                    @foreach($vehicleMakes as $make)
                                        <option value="{{ $make->id }}"
                                            {{ old('make', $vehicle->vehicle_make_id) == $make->id ? 'selected' : '' }}>
                                            {{ $make->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('make')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="model" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('vehicle.model_label') }}
                                </label>
                                <select name="model" id="model" class="bg-white border border-frost text-ash-gray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('model') border-red-500 @enderror" required>
                                    <option value="">{{ __('vehicle.model_label') }}</option>
                                    @foreach($vehicleModels as $model)
                                        <option value="{{ $model->id }}"
                                            {{ old('model', $vehicle->vehicle_model_id) == $model->id ? 'selected' : '' }}>
                                            {{ $model->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('model')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('vehicle.color_label') }}
                                </label>
                                <select name="color" id="color" class="bg-white border border-frost text-ash-gray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('color') border-red-500 @enderror" required>
                                    <option value="">{{ __('vehicle.color_label') }}</option>
                                    @foreach($vehicleColors as $color)
                                        <option value="{{ $color->id }}"
                                            {{ old('color', $vehicle->vehicle_color_id) == $color->id ? 'selected' : '' }}>
                                            {{ $color->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('color')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="make_year" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    {{ __('vehicle.year_label') }}
                                </label>
                                <select name="make_year" id="car-year" class="bg-white border border-frost text-ash-gray text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 @error('make_year') border-red-500 @enderror" required>
                                    <option value="" disabled selected>{{ __('vehicle.year_placeholder') }}</option>
                                    @for( $year = date('Y'); $year >= 1990; $year-- )
                                        <option value="{{ $year }}"
                                            {{ old('make_year', $vehicle->make_year) == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>
                                @error('make_year')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="w-1/3">
                            <div class="bg-white text-ash-gray border border-frost shadow-[5px_5px_4px_0px_#C4D4D680] rounded-[20px] px-4 py-4 rounded-lg mb-6">
                                <h2 class="text-2xl mb-8 font-bold text-deep-teal">{{ __('vehicle.amenities_title') }}</h2>
                                @foreach($amenities as $amenity)
                                    <div class="{{ $loop->last ? '' : 'mb-2' }}">
                                        <div class="flex items-center me-4">
                                            <input
                                                id="amenity_{{ $amenity->id }}"
                                                type="checkbox"
                                                name="amenities[]"
                                                value="{{ $amenity->id }}"
                                                class="w-4 h-4 text-desaturated-teal bg-white border-desaturated-teal rounded-sm focus:ring-desaturated-teal focus:ring-1"
                                                {{ in_array($amenity->id, old('amenities', $vehicle->amenities->pluck('id')->toArray())) ? 'checked' : '' }}>
                                            @if($amenity->icon)
                                                <x-dynamic-component :component="'phosphor-' . $amenity->icon" class="w-5 h-5 ms-2" />
                                            @endif
                                            <label for="amenity_{{ $amenity->id }}" class="ms-2 text-sm font-medium">{{ $amenity->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                                @error('amenities')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                                @error('amenities.*')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="bg-white border border-frost shadow-[5px_5px_4px_0px_#C4D4D680] rounded-[20px] px-4 py-4 rounded-lg mb-5">
                                <h2 class="text-2xl font-bold text-deep-teal">{{ __('vehicle.photo_title') }}</h2>
                                <div class="flex items-center justify-center w-full mt-8">
                                    <label for="vehicle_photo" class="flex flex-col items-center justify-center w-full h-55 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 @error('vehicle_photo') border-red-500 @enderror">
                                        @if($vehicle->exists && $vehicle->photo)
                                            {{-- Display the existing photo for the edit form --}}
                                            <div class="flex flex-col items-center justify-center">
                                                <img src="{{ Storage::url($vehicle->photo) }}" alt="Vehicle Photo" class="object-cover rounded-lg">
                                                <div class="inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white opacity-0 hover:opacity-100 transition-opacity duration-300">
                                                    <p class="font-semibold text-lg">{{ __('vehicle.change_photo') }}</p>
                                                </div>
                                            </div>
                                        @else
                                            {{-- Display the default upload box for the create form or if no photo exists --}}
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <x-phosphor-cloud-arrow-up-light class="w-8 h-8 mb-4 text-light-teal" />
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">{{ __('vehicle.upload_click') }}</span> {{ __('vehicle.upload_drag_drop') }}</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">{{ __('vehicle.upload_formats') }}</p>
                                            </div>
                                        @endif
                                        <input id="vehicle_photo" type="file" name="vehicle_photo" class="hidden" accept="image/*" />
                                    </label>
                                    @error('vehicle_photo')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="bg-white text-center mt-4 border border-frost shadow-[5px_5px_4px_0px_#C4D4D680] rounded-[20px] px-6 py-6 rounded-lg mb-5">
                        <h2 class="text-2xl font-bold text-deep-teal mb-4">{{ __('vehicle.ready_to_add') }}</h2>
                        <button type="submit" class="text-white bg-dusty-teal hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            {{ __('vehicle.submit_button') }}
                        </button>
                    </div>
                </form>


            </div>
        </div>
    </section>

</x-main-layout>
