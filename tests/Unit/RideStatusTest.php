<?php

use App\Enums\RideStatus;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('casts status to RideStatus enum', function () {
    $user = User::factory()->create();
    $ride = Ride::factory()->create([
        'user_id' => $user->id,
        'status' => RideStatus::Scheduled,
    ]);

    expect($ride->status)->toBeInstanceOf(RideStatus::class)
        ->and($ride->status)->toBe(RideStatus::Scheduled);
});

it('factory sets sensible status based on date_time', function () {
    // Future ride should be scheduled
    $futureRide = Ride::factory()->create([
        'date_time' => now()->addDay(),
    ]);
    expect($futureRide->status)->toBe(RideStatus::Scheduled);

    // Past ride should be completed or cancelled
    $pastRide = Ride::factory()->create([
        'date_time' => now()->subDay(),
    ]);
    expect([RideStatus::Completed, RideStatus::Cancelled])->toContain($pastRide->status);
});
