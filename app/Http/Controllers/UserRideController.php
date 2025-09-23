<?php

namespace App\Http\Controllers;

use App\Enums\RideStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Ride;

class UserRideController extends Controller
{
    protected ?User $user = null;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
    }
    public function index(Request $request): View
    {
        // Determine the current tab from route defaults or query (fallback to 'my-rides')
        $currentTab = $request->route('tab') ?? $request->get('tab', 'my-rides');
        // $user = Auth::user();

        // Get counts for the badges on each tab
        $tabCounts = $this->getTabCounts();

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
                $data['myRides'] = $this->user->rides()
                    ->where('status', RideStatus::Scheduled->value)
                    ->where('date_time', '>', now())
                    ->oldest('date_time')
                    ->paginate(10);
                break;

            case 'past-rides':
                $data['pastRides'] = $this->user->rides()
                    ->where('status', RideStatus::Completed->value)
                    ->where('date_time', '<', now())
                    ->latest('date_time')
                    ->paginate(10);
                break;

            case 'cancelled-rides':
                $data['cancelledRides'] = $this->user->rides()
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
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('profile.rides.create');
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
    /** @noinspection PhpUnusedParameterInspection */
    public function show(Request $request, string $locale, string $id): View
    {
        // Resourceful show; sidebar tab is determined dynamically or via the unified tabbed route
        $ride = Ride::query()->findOrFail($id);
        if ($ride->user_id !== Auth::id()) {
            abort(404);
        }

        $currentTab = $this->determineCurrentTab($request, $ride);
        // $user = Auth::user();

        $tabCounts = $this->getTabCounts();

        return view('profile.rides.show', compact('ride', 'currentTab', 'tabCounts'));
    }
    /** @noinspection PhpUnusedParameterInspection */
    public function showInTab(Request $request, string $locale, Ride $ride): View
    {
        if ($ride->user_id !== Auth::id()) {
            abort(404);
        }

        $allowed = ['my-rides', 'past-rides', 'cancelled-rides', 'ride-requests'];
        $tab = (string) $request->route('tab');
        $currentTab = in_array($tab, $allowed, true) ? $tab : $this->determineCurrentTab($request, $ride);
        // $user = Auth::user();

        $tabCounts = $this->getTabCounts();

        return view('profile.rides.show', compact('ride', 'currentTab', 'tabCounts'));
    }

    /**
     * Determine which sidebar tab should be active for a given ride.
     */
    /**
     * Get counts for the ride tabs for the authenticated user.
     */
    private function getTabCounts(): array
    {
        $now = now();

        return [
            'my_rides' => $this->user->rides()
                ->where('status', RideStatus::Scheduled->value)
                ->where('date_time', '>', $now)
                ->count(),

            'past_rides' => $this->user->rides()
                ->where(function ($query) use ($now) {
                    $query->where('date_time', '<', $now);
                })
                ->count(),

            'cancelled_rides' => $this->user->rides()
                ->where('status', RideStatus::Cancelled->value)
                ->count(),
        ];
    }

    private function determineCurrentTab(Request $request, Ride $ride): string
    {
        $allowed = ['my-rides', 'past-rides', 'cancelled-rides', 'ride-requests'];
        $fromRequest = $request->query('tab');
        if (is_string($fromRequest) && in_array($fromRequest, $allowed, true)) {
            return $fromRequest;
        }

        // Fallback inference based on ride state
        if ($ride->status === RideStatus::Cancelled->value) {
            return 'cancelled-rides';
        }

        if ($ride->status === RideStatus::Completed->value || optional($ride->date_time)->isPast()) {
            return 'past-rides';
        }

        return 'my-rides';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('profile.rides.edit');
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
    /*
     * Cancel ride
     * */
    public function cancelRide( Request $request, string $locale, Ride $ride)
    {
        $ride->update(['status' => RideStatus::Cancelled->value]);

        return response()->json([
            'success' => true,
            'status' => 'cancelled',
        ]);
    }


}
