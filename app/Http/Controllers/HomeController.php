<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Ride;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    public function index(): View
    {
        $info = 'Welcome to the main page!';
        // $location = Location::get();
        $location = Location::get('78.61.50.78 ');
        $cities = City::orderBy('name')->get();

        $userLocationId = null;
        if ($location && $location->cityName) {
            $dbLocation = City::where('name', $location->cityName)->first();
            if ($dbLocation) {
                $userLocationId = $dbLocation->id;
            }
        }
        $ridesFromLocation = collect();
        if ($userLocationId) {
            $ridesFromLocation = Ride::where('departure_id', $userLocationId)
                ->where('date_time', '>=', Carbon::now())
                ->orderBy('date_time')
                ->take(5) // we’ll trim to 5 total later
                ->get();
        }
        $needed = 5 - $ridesFromLocation->count();
        $ridesFromOthers = collect();
        if ($needed > 0) {
            $ridesFromOthers = Ride::where('date_time', '>=', Carbon::now())
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

