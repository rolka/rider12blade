<?php

use App\Enums\RideStatus;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('infers past-rides tab for completed ride when no tab is provided', function () {
    $user = User::factory()->create();
    /** @var Ride $ride */
    $ride = Ride::factory()->for($user)->create([
        'status' => RideStatus::Completed,
        'date_time' => now()->subDay(),
    ]);

    $this->actingAs($user);

    $response = $this->get(sprintf('/lt/profile/rides/%d', $ride->id));

    $response->assertSuccessful();
    $response->assertViewHas('currentTab', 'past-rides');
});

it('uses provided tab query parameter when showing a ride', function () {
    $user = User::factory()->create();
    /** @var Ride $ride */
    $ride = Ride::factory()->for($user)->create([
        'status' => RideStatus::Completed,
        'date_time' => now()->subDay(),
    ]);

    $this->actingAs($user);

    $response = $this->get(sprintf('/lt/profile/rides/%d?tab=my-rides', $ride->id));

    $response->assertSuccessful();
    $response->assertViewHas('currentTab', 'my-rides');
});
