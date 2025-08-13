<x-main-layout title="Create a Vehicle">
    <section class="bg-frost">
        <div class="lg:py-12 mx-auto max-w-screen-xl">
            <div class="lg:py-12">
                <div class="bg-white px-6 py-4 rounded-3xl rounded-xl shadow-lg">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="flex flex-col justify-center items-center lg:w-[45%] mx-auto lg:px-10 lg:py-8 flex-none">
                            <div class="mb-4 text-sm text-center text-deep-teal">
                                <h1 class="font-bold text-[40px] mt-8 mb-4">
                                    {{ __('auth.password_reset') }}
                                </h1>
                                <p>{{ __('auth.password_reset_description') }}</p>
                            </div>
                            <!-- Email Address -->
                            <div class="w-full">
                                <x-rider-input-label for="email" :value="__('general.email')" />
                                <x-text-input id="email" class="block mt-1 w-full bg-input-bg" type="email" name="email" :value="old('email')" required autofocus placeholder="{{ __('general.email') }}" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-auth-forms.button type="submit">
                                    {{ __('general.send') }}
                                </x-auth-forms.button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</x-main-layout>

