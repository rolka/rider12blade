<?php

use App\Enums\RideStatus;
use App\Models\Ride;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('loads a ride via localized URL and does not treat locale as ride id', function () {
    $user = User::factory()->create();

    /** @var Ride $ride */
    $ride = Ride::factory()->for($user)->create([
        'status' => RideStatus::Completed,
    ]);

    $this->actingAs($user);

    // Ensure the localized show route works with numeric ride id
    $response = $this->get(sprintf('/lt/profile/rides/%d', $ride->id));
    $response->assertSuccessful();

    // Ensure a path starting with the locale doesn't bind {ride} to the locale
    $responseBad = $this->get('/lt/profile/rides/abc');
    $responseBad->assertNotFound();
});
