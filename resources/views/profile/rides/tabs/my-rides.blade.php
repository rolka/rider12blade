@forelse($myRides as $ride)
    <x-my-rides-card :ride="$ride" />
@empty
    <x-no-rides/>
@endforelse

@if($myRides->hasPages())
    <div class="mt-6">
        {{ $myRides->appends(['tab' => 'my-rides'])->links() }}
    </div>
@endif
