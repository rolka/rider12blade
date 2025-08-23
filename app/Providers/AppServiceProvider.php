<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Language;
use App\Models\UserVehicle;
use App\Observers\CityObserver;
use App\Observers\LanguageObserver;
use App\Policies\UserVehiclePolicy;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local') && class_exists(\Laravel\Telescope\TelescopeServiceProvider::class)) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(UserVehicle::class, UserVehiclePolicy::class);
        Carbon::setLocale(app()->getLocale());

        // Register model observers
        Language::observe(LanguageObserver::class);
        City::observe(CityObserver::class);
    }

}
