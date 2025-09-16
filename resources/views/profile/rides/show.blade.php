<x-profile-rides-layout :current-tab="$currentTab" :counts="$tabCounts">
    <div class="bg-white rounded-lg shadow p-6">
        <x-my-rides-card :ride="$ride" />
    </div>
</x-profile-rides-layout>
