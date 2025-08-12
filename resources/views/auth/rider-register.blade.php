<x-main-layout title="Create a Vehicle">

    <section class="bg-frost">
        <div class="lg:py-12 mx-auto max-w-screen-xl">
            <div class="lg:py-12">
                <div class="bg-white px-6 py-4 rounded-3xl rounded-xl shadow-lg">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h1 class="font-bold text-center text-deep-teal text-[40px] mt-8">
                            {{ __('auth.register_title') }}
                        </h1>
                        <div class="flex flex-col justify-center items-center lg:w-[55%] mx-auto lg:px-10 lg:py-8 flex-none">
                            <!-- Name -->
                            <div class="w-full mb-4">
                                <x-rider-input-label for="first_name" :value="__('general.name')" />
                                <x-text-input id="first_name" class="block mt-1 w-full bg-input-bg" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="name" placeholder="{{ __('general.name') }}" />
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>

                            <!-- surname -->
                            <div class="w-full mb-4">
                                <x-rider-input-label for="surname" :value="__('general.surname')" />
                                <x-text-input id="surname" class="block mt-1 w-full bg-input-bg" type="text" name="surname" :value="old('surname')" required autocomplete="surname" placeholder="{{ __('general.surname') }}" />
                                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                            </div>

                            <!-- phone -->
                            <div class="w-full mb-4">
                                <x-rider-input-label for="phone" :value="__('general.phone')" />
                                <x-text-input id="phone" class="block mt-1 w-full bg-input-bg" type="tel" required name="phone" :value="old('phone', $user->phone ?? '')" autocomplete="tel" placeholder="{{ __('general.phone') }}" />
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="w-full mb-4">
                                <x-rider-input-label for="email" :value="__('general.email')" />
                                <x-text-input id="email" class="block mt-1 w-full bg-input-bg" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="{{ __('general.email') }}" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Password -->
                            <div class="w-full mb-4">
                                <x-rider-input-label for="password" :value="__('general.password')" />
                                <x-text-input id="password" class="block mt-1 w-full bg-input-bg"
                                              type="password"
                                              name="password"
                                              required autocomplete="new-password" placeholder="**********" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="w-full mb-4">
                                <x-rider-input-label for="password_confirmation" :value="__('general.confirm_password')" />

                                <x-text-input id="password_confirmation" class="block mt-1 w-full bg-input-bg"
                                              type="password"
                                              name="password_confirmation" required autocomplete="new-password" placeholder="**********" />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex flex-col items-center justify-end mt-4 w-full">
                                <x-auth-forms.button type="submit">
                                    {{ __('auth.register') }}
                                </x-auth-forms.button>
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                    {{ __('general.already_registered') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-main-layout>
