<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\UserVehicleController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRideController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    /*view other user profiles*/
    Route::get('/users/{user}', [UserController::class, 'show'])->where('user', '[0-9]+')->name('users.show');

    Route::prefix('profile')->name('profile.')->controller(ProfileController::class)->group(function () {
        /*todo: create controller method- index*/
        // Route::get('/info', 'index')->name('');
        Route::resource('/info', UserVehicleController::class);

        Route::get('/', 'index')->name('index');
        Route::get('edit', 'edit')->name('edit');
        Route::patch('/', 'update')->name('update');
        Route::delete('/', 'destroy')->name('destroy');

        /* all profile rides */
        Route::resource('rides', UserRideController::class);


        // Generic route to view a ride within a specific tab
        Route::get('rides/{tab}/{ride}', [UserRideController::class, 'showInTab'])
            ->where([
                'ride' => '[0-9]+',
                'tab' => 'my-rides|past-rides|cancelled-rides|ride-requests',
            ])
            ->name('rides.tab.show');

        // Additional custom routes
        Route::patch('/rides/{ride}/cancel', [UserRideController::class, 'cancelRide'])->name('rides.cancel');
        Route::patch('/ride-requests/{rideRequest}', [UserRideController::class, 'updateRideRequest'])
            ->name('ride-requests.update');

        /*todo: create controllers*/
        Route::resource('messages', UserVehicleController::class);
        Route::resource('payments', UserVehicleController::class);


        /* create and etc. vehicles */
        Route::resource('vehicles', UserVehicleController::class);
        // ->parameters(['vehicles' => 'userVehicle'])
        //     ->except(['show']);
    });


});
