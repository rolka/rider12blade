<?php

namespace App\Providers;

use App\Models\UserVehicle;
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
            // $vehicleMakes = VehicleMake::orderBy('name')->get();
            $vehicleMakes = Cache::rememberForever('vehicle_makes', function () {
                return VehicleMake::orderBy('name')->select('id', 'name')->get();
            });
            // $vehicleModels = VehicleModel::orderBy('name')->get();
            $vehicleModels = Cache::rememberForever('vehicle_models', function () {
                return VehicleModel::orderBy('name')->select('id', 'name')->get();
            });
            $vehicleColors = VehicleColor::orderByTranslation('name', App::getLocale())->get();
            $amenities = VehicleAmenity::all(); // Get all available amenities
            // $vehicle = new UserVehicle();
            $view->with([
                'vehicleColors' => $vehicleColors,
                'amenities' => $amenities,
                'vehicleMakes' => $vehicleMakes,
                'vehicleModels' => $vehicleModels,
                // 'vehicle' => $vehicle,
            ]);
        });
    }
}
