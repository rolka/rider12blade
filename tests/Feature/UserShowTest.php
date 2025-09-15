<?php

use App\Models\User;

test('user show controller and route work', function () {
    // Create users directly to avoid factory migration issues
    $user = User::create([
        'first_name' => 'John',
        'surname' => 'Doe',
        'email' => 'john@example.com',
        'phone' => '123-456-7890',
        'password' => bcrypt('password'),
    ]);

    $authUser = User::create([
        'first_name' => 'Auth',
        'surname' => 'User',
        'email' => 'auth@example.com',
        'password' => bcrypt('password'),
    ]);

    $response = $this
        ->actingAs($authUser)
        ->get('/en/users/' . $user->id);

    $response->assertOk();
    $response->assertSee('John Doe');
    $response->assertSee('john@example.com');
    $response->assertSee('123-456-7890');
});
