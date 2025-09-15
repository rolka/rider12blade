@forelse($cancelledRides as $ride)
    <x-my-rides-card :ride="$ride" />
@empty
    <x-no-rides/>
@endforelse

@if($cancelledRides->hasPages())
    <div class="mt-6">
        {{ $cancelledRides->appends(['tab' => 'cancelled-rides'])->links() }}
    </div>
@endif
