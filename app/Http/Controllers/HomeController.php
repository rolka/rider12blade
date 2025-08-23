<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Ride;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    public function index(): View
    {
        $info = 'Welcome to the main page!';

        // Cache location lookup for better performance - only fetch once per session
        $ip = app()->isLocal() ? '78.61.50.78' : request()->ip();
        $location = Cache::remember('user_location_' . $ip, 3600, function () {
            try {
                return Location::get();
            } catch (Exception $e) {
                return null;
            }
        });

        // Cache cities for better performance
        $cities = Cache::remember('cities_ordered', 3600, function () {
            return City::orderBy('name')->select('id', 'name')->get();
        });

        $userLocationId = null;
        if ($location && $location->cityName) {
            $userLocationId = Cache::remember('city_id_' . $location->cityName, 3600, function () use ($location) {
                $dbLocation = City::where('name', $location->cityName)->first(['id']);
                return $dbLocation ? $dbLocation->id : null;
            });
        }
        $ridesFromLocation = collect();
        if ($userLocationId) {
            $ridesFromLocation = Ride::with(['user:id,first_name,photo', 'departure:id,name', 'destination:id,name'])
                ->where('departure_id', $userLocationId)
                ->where('date_time', '>=', Carbon::now())
                ->orderBy('date_time')
                ->take(5) // we’ll trim to 5 total later
                ->get();
        }
        $needed = 5 - $ridesFromLocation->count();
        $ridesFromOthers = collect();
        if ($needed > 0) {
            $ridesFromOthers = Ride::with(['user:id,first_name,photo', 'departure:id,name', 'destination:id,name'])
                ->where('date_time', '>=', Carbon::now())
                ->when($userLocationId, fn($q) => $q->where('departure_id', '!=', $userLocationId))
                ->orderBy('date_time')
                ->take($needed)
                ->get();
        }
        // Merge both collections
        $rides = $ridesFromLocation->concat($ridesFromOthers);

        // $rides = Ride::where('date_time', '>=', Carbon::now())
        //     ->orderBy('date_time')
        //     ->take(5)
        //     ->get();

        return view('home', compact(
            'info',
            'location',
            'cities',
            'rides',
        ));

    }

}

