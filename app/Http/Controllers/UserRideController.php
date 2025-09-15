<?php

namespace App\Http\Controllers;

use App\Enums\RideStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserRideController extends Controller
{
    public function index(Request $request): View
    {
        // Get which tab is currently active (default to 'my-rides')
        $currentTab = $request->get('tab', 'my-rides');
        $user = Auth::user();

        // Get counts for the badges on each tab
        $tabCounts = [
            'my_rides' => $user->rides()
                ->where('status', RideStatus::Scheduled->value)
                ->where('date_time', '>', now())
                ->count(),

            'past_rides' => $user->rides()
                // ->where('status', 'completed')
                ->where(function ($query) {
                    $query->where('date_time', '<', now());
                        // ->where('status', '!=', 'cancelled');
                })
                ->count(),

            'cancelled_rides' => $user->rides()
                ->where('status', RideStatus::Cancelled->value)
                ->count(),

            // 'ride_requests' => RideRequest::whereHas('ride', function ($query) use ($user) {
            //     $query->where('user_id', $user->id);
            // })
            //     ->where('status', 'pending')
            //     ->count(),
        ];

        // Initialize data array
        $data = [
            'currentTab' => $currentTab,
            'tabCounts' => $tabCounts,
            'myRides' => collect(),
            'pastRides' => collect(),
            'cancelledRides' => collect(),
            'rideRequests' => collect(),
        ];

        // Load data based on which tab is active
        switch ($currentTab) {
            case 'my-rides':
                $data['myRides'] = $user->rides()
                    ->where('status', RideStatus::Scheduled->value)
                    ->where('date_time', '>', now())
                    ->oldest('date_time')
                    ->paginate(10);
                break;

            case 'past-rides':
                $data['pastRides'] = $user->rides()
                    ->where('status', RideStatus::Completed->value)
                    ->where('date_time', '<', now())
                    ->latest('date_time')
                    ->paginate(10);
                break;

            case 'cancelled-rides':
                $data['cancelledRides'] = $user->rides()
                    ->where('status', RideStatus::Cancelled->value)
                    ->latest('date_time')
                    ->paginate(10);
                break;

                /*
                 * todo: I need to create ride requests first
                 * */
            // case 'ride-requests':
            //     $data['rideRequests'] = RideRequest::whereHas('ride', function ($query) use ($user) {
            //         $query->where('user_id', $user->id);
            //     })
            //         ->with(['user', 'ride'])
            //         ->latest()
            //         ->paginate(10);
            //     break;
        }

        return view('profile.rides.index', $data);
    }

    /**
     * Display a listing of the resource.
     */
    public function indexo(Request $request): View
    {
        $tab = $request->get('tab', 'my-rides');
        $user = Auth::user();
        $data = [
            'currentTab' => $tab,
            'myRides' => collect(),
            'pastRides' => collect(),
            'cancelledRides' => collect(),
            'rideRequests' => collect(),
        ];
        switch ($tab) {
            case 'my-rides':
                $data['myRides'] = $user->rides()
                    // ->where('status', 'active')
                    ->where('date_time', '>', now())
                    // ->latest('departure_time')
                    ->latest('date_time')
                    ->paginate(10);
                break;
            case 'past-rides':
                $data['pastRides'] = $user->rides()
                    // ->where('status', 'completed')
                    // ->orWhere(function($query) {
                    ->where(function($query) {
                        $query->where('date_time', '<', now());
                            // ->where('status', '!=', 'cancelled');
                    })
                    ->latest('date_time')
                    ->paginate(10);
                break;
            // case 'cancelled-rides':
            //     $data['cancelledRides'] = $user->rides()
            //         ->where('status', 'cancelled')
            //         ->latest('updated_at')
            //         ->paginate(10);
            //     break;
            // case 'ride-requests':
            //     $data['rideRequests'] = RideRequest::where('user_id', $user->id)
            //         ->with(['ride', 'ride.user'])
            //         ->latest()
            //         ->paginate(10);
            //     break;
        }
        return view('profile.rides.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('profile.rides.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
