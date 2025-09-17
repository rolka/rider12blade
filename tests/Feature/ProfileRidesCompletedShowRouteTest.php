<?php

use App\Enums\RideStatus;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('shows a completed ride via clean URL and sets past-rides tab', function () {
    $user = User::factory()->create();
    /** @var Ride $ride */
    $ride = Ride::factory()->for($user)->create([
        'status' => RideStatus::Completed,
        'date_time' => now()->subDays(2),
    ]);

    $this->actingAs($user);

    $response = $this->get(sprintf('/lt/profile/rides/completed/%d', $ride->id));

    $response->assertSuccessful();
    $response->assertViewHas('currentTab', 'past-rides');
});
