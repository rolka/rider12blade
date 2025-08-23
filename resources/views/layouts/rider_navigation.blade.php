{{--@php use Illuminate\Support\Facades\Route; @endphp--}}

<nav class="bg-frost border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <!-- Brand/Logo -->
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logos/rider-logo.png') }}"
                 class="mr-3 h-6 sm:h-9"
                 alt="{{ config('app.name', 'Laravel') }} - Logo"/>
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900 sr-only">
                {{ config('app.name', 'Laravel') }}
            </span>
        </a>

        <!-- Right side container for all menu items and dropdowns -->
        <div class="flex items-center md:space-x-6">
            <!-- Main navigation links -->
            <div class="items-center justify-between hidden w-full md:flex md:w-auto" id="navbar-menu">
                <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0">
                    <li><a href="{{ route('profile.rides.create') }}" class="block py-2 px-3 text-deep-teal md:p-0"
                           aria-current="page">{{ __('menu.add_ride') }}</a></li>
                    <li><a href="{{ route('how-it-works') }}" class="block py-2 px-3 text-deep-teal md:p-0">{{ __('menu.how_it_works') }}</a></li>
                </ul>
            </div>

            <!-- Language and User Dropdowns -->
            <div class="flex items-center space-x-2 md:space-x-0">
                <!-- Language Selector Dropdown Button -->
                <button id="language-toggle-btn" type="button"
                        class="flex items-center text-sm font-medium text-gray-900 rounded-full p-1 me-2 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100"
                        aria-expanded="false">
                    @php
                        $activeCode = strtolower($currentLanguage->code ?? app()->getLocale());
                    @endphp
                    <x-dynamic-component :component="'flag-language-' . $activeCode" class="w-6 h-6 me-3 rounded-full" />
                    <span>
                        @if($currentLanguage)
                            {{ $currentLanguage->displayName() }}
                        @else
                            {{ strtoupper(app()->getLocale()) }}
                        @endif
                    </span>
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m1 1 4 4 4-4"/>
                    </svg>
                </button>

                <!-- Language Dropdown Menu -->
                <div id="language-dropdown"
                     class="z-50 hidden absolute top-14 right-1/2 -mr-16 md:mr-0 md:right-auto md:w-40 md:top-14 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow-lg">
                    <ul class="py-2 font-medium" role="none">
                        @foreach($languages as $language)
                            @php
                                $code = strtolower($language->code);
                            @endphp
                            <li>
                                <a href="{{ route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['locale' => $code])) }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <div class="inline-flex items-center">
                                        <x-dynamic-component :component="'flag-language-' . $code" class="w-4 h-4 me-2 rounded-full" />
                                        {{ $language->displayName() }}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                @guest
                    <a href="{{ route('login') }}">
                        <x-phosphor-user-light class="text-deep-teal w-6 h-6 ms-2"/>
                    </a>
                @endguest
                @auth
                    <!-- User action area wrapper (add relative here) -->
                    <div class="relative">
                        <!-- User Dropdown Button -->
                        <button id="user-toggle-btn" type="button"
                                class="flex items-center text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 hover:cursor-pointer"
                                aria-expanded="false">
                            <span class="sr-only">Open user menu</span>
                            @if(Auth::user()->photo)
                                <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->photo }}"
                                     alt="{{ Auth::user()->first_name }}">
                            @else
                                <p class="w-8 h-8 rounded-full text-white flex items-center justify-center">
                                    {{ strtoupper(substr(Auth::user()->first_name, 0, 1) . substr(Auth::user()->surname, 0, 1)) }}
                                </p>
                            @endif
                        </button>

                        <!-- User Dropdown Menu -->
                        <div id="user-dropdown"
                             class="z-50 hidden absolute right-0 top-full mt-3 md:w-80 my-4 text-base text-deep-teal list-none bg-white divide-y divide-gray-100 border border-frost shadow-[5px_5px_4px_0px_#C4D4D680] rounded-[20px]">
                            <ul class="px-2 py-3" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="{{ route('profile.rides.index') }}"
                                       class="flex items-center justify-between px-4 py-4 text-sm hover:bg-frost hover:text-deep-teal rounded-[15px]">
                                        <span class="flex items-center gap-2">
                                            <x-phosphor-car-light class="w-4 h-4"/>
                                            {{ __('general.my_rides') }}
                                        </span>
                                        <x-phosphor-caret-right-light class="w-4 h-4"/>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.messages.index') }}"
                                       class="flex items-center justify-between px-4 py-4 text-sm hover:bg-frost hover:text-deep-teal rounded-[15px]">
                                        <span class="flex items-center gap-2">
                                            <x-phosphor-bell-ringing-light class="w-4 h-4"/>
                                            {{ __('messages.messages') }}
                                        </span>
                                        <x-phosphor-caret-right-light class="w-4 h-4"/>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.index') }}"
                                       class="flex items-center justify-between px-4 py-4 text-sm hover:bg-frost hover:text-deep-teal rounded-[15px]">
                                        <span class="flex items-center gap-2">
                                            <x-phosphor-user-light class="w-4 h-4"/>
                                            {{ __('general.profile') }}
                                        </span>
                                        <x-phosphor-caret-right-light class="w-4 h-4"/>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('profile.payments.index') }}"
                                       class="flex items-center justify-between px-4 py-4 text-sm hover:bg-frost hover:text-deep-teal rounded-[15px]">
                                        <span class="flex items-center gap-2">
                                            <x-phosphor-coins-light class="w-4 h-4"/>
                                            {{ __('general.payments') }}
                                        </span>
                                        <x-phosphor-caret-right-light class="w-4 h-4"/>
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                                class="flex items-center justify-between w-full px-4 py-4 text-sm hover:bg-frost hover:text-deep-teal rounded-[15px] hover:cursor-pointer">
                                            <span class="flex items-center gap-2">
                                                <x-phosphor-arrow-square-out-light class="w-4 h-4"/>
                                                {{ __('auth.sign_out') }}
                                            </span>
                                            <x-phosphor-caret-right-light class="w-4 h-4"/>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endauth

                <!-- Main mobile menu button -->
                <button id="mobile-menu-toggle-btn" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                        aria-controls="navbar-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
