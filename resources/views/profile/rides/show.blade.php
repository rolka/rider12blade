<x-profile-rides-layout :current-tab="$currentTab" :counts="$tabCounts">
    <div class="bg-white rounded-lg shadow">
{{--        <x-my-rides-card :ride="$ride" />--}}
        @if( $currentTab === 'my-rides')
            <x-my-ride :ride="$ride" />
        @elseif($currentTab === 'cancelled-rides')
            <x-my-ride :ride="$ride" />
        @endif

    </div>
</x-profile-rides-layout>
