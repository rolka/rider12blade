<?php

namespace App\Providers;

use App\Models\Country;
use App\Models\Language;
use App\Models\VehicleAmenity;
use App\Models\VehicleColor;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('profile.vehicles.create', function ($view) {
            $vehicleMakes = Cache::rememberForever('vehicle_makes', function () {
                return VehicleMake::orderBy('name')->select('id', 'name')->get();
            });
            $vehicleModels = Cache::rememberForever('vehicle_models', function () {
                return VehicleModel::orderBy('name')->select('id', 'name')->get();
            });
            $vehicleColors = VehicleColor::orderByTranslation('name', App::getLocale())->get();
            $amenities = VehicleAmenity::all(); // Get all available amenities
            $view->with([
                'vehicleColors' => $vehicleColors,
                'amenities' => $amenities,
                'vehicleMakes' => $vehicleMakes,
                'vehicleModels' => $vehicleModels,
            ]);
        });

        if (class_exists(Language::class)) {
            View::composer('layouts.rider_navigation', function ($view) {
                $languages = Cache::rememberForever('languages_all', function () {
                    return Language::select('id', 'code', 'name')->get();
                });
                
                $currentLocale = app()->getLocale();
                $currentLanguage = Cache::rememberForever('language_' . strtolower($currentLocale), function () use ($currentLocale) {
                    return Language::where('code', strtolower($currentLocale))->select('id', 'code', 'name')->first();
                });

                $view->with('languages', $languages);
                $view->with('currentLanguage', $currentLanguage);
            });
        }
    }
}
