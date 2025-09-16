@props([
    'currentTab' => 'my-rides',
    'counts' => [],
    'title' => 'My rides',
])

<x-main-layout :title="$title">
    <div class="max-w-7xl mx-auto py-6 sm:px-4 sm:px-6 lg:px-8 sm:mt-10">
        <div class="mb-8">
            <div class="flex flex-col md:flex-row">
                <!-- Sidebar -->
                <div class="w-full md:w-64 bg-white sm:border sm:border-frost sm:shadow-[5px_5px_4px_0px_#C4D4D680] sm:rounded-[20px]">
                    <div class="px-2 py-4">
                        <x-ride-tabs :current-tab="$currentTab" :counts="$counts" />
                    </div>
                </div>
                <!-- Main Content -->
                <div class="flex-1 flex flex-col">
                    <main class="flex-1 px-6 overflow-y-auto">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
