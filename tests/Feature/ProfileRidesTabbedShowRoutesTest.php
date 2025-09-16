<?php

use App\Enums\RideStatus;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows a scheduled ride on the my-rides tabbed URL', function () {
    $user = User::factory()->create();
    /** @var Ride $ride */
    $ride = Ride::factory()->for($user)->create([
        'status' => RideStatus::Scheduled,
        'date_time' => now()->addDay(),
    ]);

    $this->actingAs($user);

    $response = $this->get(sprintf('/lt/profile/rides/my-rides/%d', $ride->id));

    $response->assertSuccessful();
    $response->assertViewHas('currentTab', 'my-rides');
});

it('shows a cancelled ride on the cancelled-rides tabbed URL', function () {
    $user = User::factory()->create();
    /** @var Ride $ride */
    $ride = Ride::factory()->for($user)->create([
        'status' => RideStatus::Cancelled,
        'date_time' => now()->subDay(),
    ]);

    $this->actingAs($user);

    $response = $this->get(sprintf('/lt/profile/rides/cancelled-rides/%d', $ride->id));

    $response->assertSuccessful();
    $response->assertViewHas('currentTab', 'cancelled-rides');
});
