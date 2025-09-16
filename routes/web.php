<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RideSearchController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect(app()->getLocale()); // <-- Handles redirect with no locale to the current locale
});

Route::prefix('{locale}') // <-- Add the locale segment to the URL
    ->where(['locale' => '[a-zA-Z]{2}']) // <-- Add a regex to validate the locale
    ->middleware(SetLocale::class) // <-- Add the middleware
    ->group(function () {

        // Constrain any {ride} route parameter to numeric only to avoid conflicts with the {locale} segment
        Route::pattern('ride', '[0-9]+');

        Route::get('/', [HomeController::class, 'index'])->name('home');

        Route::get('/search', [RideSearchController::class, 'index'])->name('search.index');
        Route::get('/rides', [RideSearchController::class, 'index'])->name('rides');
        Route::get('how-it-works', [ProfileController::class, 'index'])->name('how-it-works');;

        // The dashboard route
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        // This will include all the routes from auth.php and prefix them with the locale.
        // For example, /en/login, /lt/register, etc.
        require __DIR__.'/auth.php';

});


// Route::get('/lang/{locale}', function ($locale) {
//     session()->put('locale', $locale);
//     return redirect()->back();
// })->name('locale.set');

// --- All your application routes go inside this group ---
// Route::group(['prefix' => '{locale}', 'as' => 'locale.', 'middleware' => 'web'], function () {

    // Route::get('/', [HomeController::class, 'index'])->name('home');
    //
    // Route::get('/search', [RideSearchController::class, 'index'])->name('search.index');
    //
    // Route::get('/rides', [RideSearchController::class, 'index'])->name('rides');
    //
    // // The dashboard route
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    //
    // // This will include all the routes from auth.php and prefix them with the locale.
    // // For example, /en/login, /lt/register, etc.
    // require __DIR__.'/auth.php';

// });
