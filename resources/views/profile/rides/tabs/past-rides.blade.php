@forelse($pastRides as $ride)
    <x-my-rides-card :ride="$ride" />
@empty
    <x-no-rides/>
@endforelse

@if($pastRides->hasPages())
    <div class="mt-6">
        {{ $pastRides->appends(['tab' => 'past-rides'])->links() }}
    </div>
@endif
