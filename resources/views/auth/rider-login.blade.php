<x-main-layout title="Create a Vehicle">

    <section class="bg-frost">
        <div class="lg:py-12 mx-auto max-w-screen-xl">
            <div class="lg:py-12">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div class="bg-white px-6 py-4 rounded-3xl rounded-xl shadow-lg">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <h1 class="font-bold text-center text-deep-teal text-[40px] mt-8">
                            {{ __('auth.login_title') }}
                        </h1>

                        <div class="flex flex-col justify-center items-center lg:w-[35%] mx-auto lg:px-10 lg:py-8 flex-none">
                            <div class="w-full">
                                <button type="button"
                                        {{-- onclick="window.location.href='{{ route('auth.redirection', 'facebook') }}'"--}}
                                        {{-- onclick="window.location.href=''"--}}
                                        class="rounded-[20px] justify-center w-full text-desaturated-teal border border-desaturated-teal focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium text-base px-5 py-4 text-center inline-flex items-center me-2 mb-6 cursor-pointer hover:bg-desaturated-teal hover:text-white">
                                    <!--hover:bg-[#4285F4]-->
                                    <x-phosphor-facebook-logo-light class="w-5 h-5 ms-2 mr-2" />
                                    {{ __('auth.sign_with_facebook') }}
                                </button>
                            </div>

                            <div class="w-full">
                                <button type="button"
                                        {{-- onclick="window.location.href='{{ route('auth.redirection', 'facebook') }}'"--}}
                                        {{-- onclick="window.location.href=''"--}}
                                        class="flex rounded-[20px] justify-center w-full text-desaturated-teal border border-desaturated-teal focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium text-base px-5 py-4 text-center inline-flex items-center me-2 mb-6 cursor-pointer hover:bg-desaturated-teal hover:text-white">
{{--                                    hover:bg-[#3b5998]--}}
                                    <x-phosphor-google-logo-light class="w-5 h-5 ms-2 mr-2" />
                                    {{ __('auth.sign_with_google') }}
                                </button>
                            </div>
                            <p class="text-center">{{ __('general.or') }}</p>
                            @if ($errors->has('email'))
                                <div class="w-full mb-4 p-4 text-sm border border-red-900 text-red-700 rounded-lg" role="alert">
                                    <span class="font-medium">
                                        {{ $errors->first('email') }}
                                    </span>
                                </div>
                            @endif
                            <div class="w-full text-deep-teal">
                                <label for="email" class="block text-sm font-semibold">{{ __('general.email') }}</label>
                                <input id="email"
                                       class="block mt-1 w-full rounded-md border-shadow-light bg-frost focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       type="email"
                                       name="email" required autofocus
                                       autocomplete="email"
                                       value="{{ old('email') }}"
                                       placeholder="email@gmail.com"
                                />
                            </div>

                            <div class="mt-4 w-full text-deep-teal">
                                <label for="password" class="block text-sm font-semibold">{{ __('general.password') }}</label>
                                <input id="password" class="block mt-1 w-full rounded-md border-shadow-light bg-frost focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       type="password"
                                       name="password"
                                       required autocomplete="current-password"
                                       placeholder="**********"
                                />
                            </div>
                            <div class="block mt-4 w-full">
                                <label for="remember_me" class="inline-flex items-center text-deep-teal text-sm">
                                    <input id="remember_me" type="checkbox" class="rounded border-deep-teal focus:ring-indigo-500" name="remember">
                                    <span class="ms-2">{{ __('general.remember_me') }}</span>
                                </label>
                            </div>
                            <div class="w-full mt-2 mb-6">
                                <button type="submit"
                                        class="rounded-[20px] justify-center w-full text-desaturated-teal border border-desaturated-teal focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium text-base px-5 py-4 text-center inline-flex items-center me-2 cursor-pointer hover:bg-desaturated-teal hover:text-white">
                                    {{ __('general.login') }}
                                </button>
                            </div>
                            <div>
                                <a href="{{ route('register') }}" class="underline text-storm-teal">{{ __('general.no_account') }}</a>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="flex items-center justify-end mt-4 w-full">
                                    <a href="{{ route('password.request') }}" class="underline text-sm font-bold rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ __('general.forgot_password') }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</x-main-layout>

