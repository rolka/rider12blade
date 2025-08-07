<x-main-layout title="Main page">
    <section class="bg-white">
        {{--        <div class="py-8 mx-auto max-w-screen-xl lg:py-16  ">--}}
        <div class="w-full">
            <p>
                <img src="{{ asset('images/content/main-content.png') }}" alt="" class="w-full">
            </p>
        </div>
    </section>
    <section class="bg-frost">
        <div class="py-8 mx-auto max-w-screen-xl lg:py-16">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-deep-teal">Tavo kelionė už mažesnę kainą.</h2>
            </div>
            <div class="bg-white px-6 py-4 rounded-3xl">
                <form action="{{ route('search.index') }}" method="GET" class="flex flex-wrap items-end gap-4 w-full">
                    <div class="flex flex-col flex-1 min-w-[200px]">
                        <label for="from" class="mb-1 text-xs font-semibold text-gray-900">
                            {{ __('form.from') }}
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <!-- location icon -->
                                <svg class="w-6 h-6 text-[#AEAFAD]" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17.8 13.938A7 7 0 1 0 6.336 14.082L12 21l5.13-6.248Z"/>
                                </svg>
                            </span>
                            <select
                                id="from"
                                name="from"
                                required
                                class="block w-full pl-10 p-2 text-sm text-[#AEAFAD] bg-[#FAFBF9] border border-[#F5F7F3] rounded-lg focus:ring-blue-500 focus:border-blue-500"
                            >
                                <option selected>{{ __('form.from') }}</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="flex flex-col flex-1 min-w-[200px]">
                        <label for="to" class="mb-1 text-xs font-semibold text-gray-900">
                            {{ __('form.to') }}
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <!-- location icon -->
                                <svg class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17.8 13.938A7 7 0 1 0 6.336 14.082L12 21l5.13-6.248Z"/>
                                </svg>
                            </span>
                            <select
                                id="to"
                                name="to"
                                required
                                class="block w-full pl-10 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            >
                                <option selected disabled>{{ __('form.to') }}</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex flex-col flex-1 min-w-[200px]">
                        <label for="date" class="mb-1 text-xs font-semibold text-gray-900">
                            {{ __('form.date') }}
                        </label>
                        <div class="relative max-w-sm">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                                </svg>
                            </div>
                            <input id="default-datepicker" type="text" class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5" placeholder="{{ __('form.date') }}">

                        </div>
                    </div>
                    <div class="flex flex-col flex-1 min-w-[200px]">
                        <label for="passengers" class="mb-1 text-xs font-semibold text-gray-900">
                            {{ __('form.passengers') }}
                        </label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <!-- user group icon -->
                                <svg class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                          d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2M10.764 8.5a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1ZM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                            </span>
                            <select
                                id="passengers"
                                name="passengers"
                                required
                                class="block w-full pl-10 p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            >
                                <option disabled selected>{{ __('form.passengers') }}</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit"
                                class="bg-red-600 hover:bg-blue-800 font-medium rounded-full p-0 focus:outline-none focus:ring-4 focus:ring-blue-300 flex items-center justify-center">
                                <span class="bg-[#C4D4D6] rounded-full p-2">
                                    <svg class="w-6 h-6 text-gray-800" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                              d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </span>
                            <span class="sr-only">{{ __('form.search') }}</span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <section class="bg-white">
        <div class="py-8 mx-auto max-w-screen-xl lg:py-16">
            <div class="flex justify-between items-center justify-center mb-5">
                <h2 class="text-2xl font-bold text-deep-teal">Kelionės tavo mieste šiandien:</h2>
                <a href="{{ route('rides') }}" class="text-desaturated-teal bg-shadow-light hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 focus:outline-none">
                    Daugiau kelionių tavo mieste
                </a>
            </div>
            <!--todo: add reservation- form with action-->
            @foreach($rides as $ride)
                <div class="flex justify-between items-center border border-frost shadow-[5px_5px_4px_0px_#C4D4D680] rounded-[20px] px-4 py-4 rounded-lg mb-5">
{{--                    space-x-4--}}
                    <div class="flex flex-col w-[30%]">
                        <div class="flex justify-between w-full text-dark-teal text-lg font-medium">
                            <div>
                                <p class="text-dark-teal">{{ $ride->departure->name }}</p>
                                <p>{{ $ride->date_only }} - {{ $ride->time_only }}</p>
                            </div>
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                            </svg>
                            <p>{{ $ride->destination->name }}</p>
                        </div>
                        <div class="flex items-center gap-2 text-ash-gray text-sm font-semibold">
                            <img src="{{ $ride->user->photo }}" alt="{{ $ride->user->first_name }}" class="w-10 h-10 rounded-full border border-2 border-[#41747B]">
                            <p>{{ $ride->user->first_name }}</p>
                            <div class="flex flex-row relative">
                                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                                <span class="absolute text-sm -top-2 -end-2" title="{{ __('messages.available_seats') }}">{{ $ride->available_seats }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="border-l border-frost h-24"></div>
                    <div class="text-center">
                        <p class="text-ash-gray text-sm font-semibold">Kelionės stotelės:</p>
                        <div class="flex items-center gap-2 text-dark-teal text-lg font-medium">
                            <p class="">{{ $ride->departure->name }}</p>
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                            </svg>
                            <p>{{ $ride->destination->name }}</p>
                        </div>
                    </div>
                    <div class="border-l border-frost h-24"></div>
                    <div class="text-center">
                        <p class="text-ash-gray text-sm font-semibold">Kelionės kaina:</p>
                        <p class="text-dark-teal text-lg font-medium">{{ $ride->formatted_price }}</p>
                    </div>
                    <div class="border-l border-frost h-24"></div>
                    <div>
                        <button type="button" class="text-white bg-dusty-teal hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Rezervuoti kelionę
                        </button>
                    </div>
                </div>

            @endforeach
            @if ($location)
                <p><strong>IP:</strong> {{ $location->ip }}</p>
                <p><strong>Country:</strong> {{ $location->countryName }}</p>
                <p><strong>City:</strong> {{ $location->cityName }}</p>
                <p><strong>Region:</strong> {{ $location->regionName }}</p>
                <p><strong>Latitude:</strong> {{ $location->latitude }}</p>
                <p><strong>Longitude:</strong> {{ $location->longitude }}</p>
            @else
                <p>Location not found.</p>
            @endif
        </div>
    </section>
    <section class="bg-white ">
        <div class="py-8 mx-auto max-w-screen-xl lg:py-16">
            <div class="flex gap-6">
                <div class="flex-1 p-4 border border-frost shadow-[5px_5px_4px_0px_#C4D4D680] rounded-[20px] px-4 py-5">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/content/benefits.png') }}" alt="" class="mx-auto block">
                    </div>
                    <div>
                        <h2 class="font-bold text-[24px]">Jūsų pasirinkta kelionė už mažą kainą</h2>
                        <p class="text-deep-teal text-base">Nesvarbu kur keliaujate, raskite tobulą kelionę iš mūsų plataus krypčių ir maršrutų asortimento už mažą kainą.</p>
                    </div>
                </div>
                <div class="flex-1 p-4 border border-frost shadow-[5px_5px_4px_0px_#C4D4D680] rounded-[20px] px-4 py-5">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/content/benefits.png') }}" alt="" class="mx-auto block">
                    </div>
                    <div>
                        <h2 class="font-bold text-[24px]">Slinkite, spustelėkite, bakstelėkite ir pirmyn!</h2>
                        <p class="text-deep-teal text-base">Užsisakyti kelionę dar niekada nebuvo taip paprasta. Dėl mūsų paprastos platformos, paremos puikiomis technologijomis, vos per kelias minutes galite užsisakyti kelionę netoliese.</p>
                    </div>
                </div>
                <div class="flex-1 p-4 border border-frost shadow-[5px_5px_4px_0px_#C4D4D680] rounded-[20px] px-4 py-5">
                    <div class="text-center mb-6">
                        <img src="{{ asset('images/content/benefits.png') }}" alt="" class="mx-auto block">
                    </div>
                    <div>
                        <h2 class="font-bold text-[24px]">Pasitikėkite, su tuo kuo keliaujate</h2>
                        <p class="text-deep-teal text-base">Skiriame daug laiko susipažinti su kiekvienu savo nariu. Tikriname atsiliepimus, profilius ir asmens dokumentus, kad žinotume, su kuo keliaujate ir galėtumėte ramiai užsisakyti kelionę mūsų saugioje platformoje.</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    {{--todo: later--}}
    <section class="bg-white hidden">
        <div class="py-8 mx-auto max-w-screen-xl lg:py-16  ">
            <p>Reference site about Lorem Ipsum, giving information on</p>
        </div>
    </section>
    <section class="bg-frost">
        <div class="py-8 mx-auto max-w-screen-xl">
            <div class="flex justify-between items-center mb-6">
                <h2 class="font-bold text-deep-teal text-[40px]">Junkis prie mūsų laimingų klientų</h2>
                <a href="{{ route('rides') }}" class="text-white bg-steel-teal hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 focus:outline-none">
                    Prisijunk prie mūsų
                </a>
            </div>
            <div class="flex justify-between gap-6">
                <div class="flex flex-1 items-start bg-white px-6 py-5 gap-6 rounded-xl border border-frost shadow-[5px_5px_4px_0px_#C4D4D680] rounded-[20px]">
                    <div class="w-[60px] h-[60px] shrink-0">
                        <img src="{{  asset('images/content/user-1.png')  }}" class="w-full h-full object-cover rounded-full" alt="">
                    </div>
                    <div class="">
                        <h3 class="text-dark-teal font-medium text-lg">Tomas</h3>
                        <div class="flex gap-1 items-center">
                            <svg class="w-6 h-6 text-desaturated-teal" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                            </svg>
                            <span>5</span>
                        </div>
                        <p class="text-base text-deep-teal mt-1">Puikiai ivykusi kelionė, sutartu laiku buvau numatytoje vietoje </p>
                    </div>
                </div>
                <div class="flex flex-1 items-start bg-white px-6 py-5 gap-6 rounded-xl border border-frost shadow-[5px_5px_4px_0px_#C4D4D680] rounded-[20px]">
                    <div class="w-[60px] h-[60px] shrink-0">
                        <img src="{{  asset('images/content/user-1.png')  }}" class="w-full h-full object-cover rounded-full" alt="">
                    </div>
                    <div class="">
                        <h3 class="text-dark-teal font-medium text-lg">Tomas</h3>
                        <div class="flex gap-1 items-center">
                            <svg class="w-6 h-6 text-desaturated-teal" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                            </svg>
                            <span>5</span>
                        </div>
                        <p class="text-base text-deep-teal mt-1">Puikiai ivykusi kelionė, sutartu laiku buvau numatytoje vietoje </p>
                    </div>
                </div>
                <div class="flex flex-1 items-start bg-white px-6 py-5 gap-6 rounded-xl border border-frost shadow-[5px_5px_4px_0px_#C4D4D680] rounded-[20px]">
                    <div class="w-[60px] h-[60px] shrink-0">
                        <img src="{{  asset('images/content/user-1.png')  }}" class="w-full h-full object-cover rounded-full" alt="">
                    </div>
                    <div class="">
                        <h3 class="text-dark-teal font-medium text-lg">Tomas</h3>
                        <div class="flex gap-1 items-center">
                            <svg class="w-6 h-6 text-desaturated-teal" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"/>
                            </svg>
                            <span>5</span>
                        </div>
                        <p class="text-base text-deep-teal mt-1">Puikiai ivykusi kelionė, sutartu laiku buvau numatytoje vietoje </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white ">
        <div class="py-8 mx-auto max-w-screen-xl lg:py-16  ">
            <p>Kaip naudotis Rider?</p>
        </div>
    </section>
    <section class="bg-white ">
        <div class="py-8 mx-auto max-w-screen-xl lg:py-16  ">
            <p>Padėkite mums apsaugoti jus nuo sukčiavimo</p>
        </div>
    </section>
    <section class="bg-white ">
        <div class="py-8 mx-auto max-w-screen-xl lg:py-16  ">
            <p>Busimi renginiai Lietuvoje</p>
        </div>
    </section>
    <section class="bg-white ">
        <div class="py-8 mx-auto max-w-screen-xl lg:py-16  ">
            <p>Rekomenduok draugams, bei gauk tipsų</p>
        </div>
    </section>


</x-main-layout>
