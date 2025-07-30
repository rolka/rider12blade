<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserVehicle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserVehicleController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(UserVehicle::class, 'vehicle');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $vehicles = auth()->user()->vehicles()->latest()->paginate(20);
        return view('profile.vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('profile.vehicles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // todo: make form validations in request!
        $validated = $request->validate([
            'make' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'registration_number' => ['required', 'string', 'max:255', 'unique:user_vehicles'],
        ]);

        auth()->user()->vehicles()->create($validated);

        return redirect()
            ->route('profile.vehicles.index')
            ->with('success', 'Vehicle created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(UserVehicle $vehicle): View
    {
        return view('profile.vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserVehicle $vehicle): View
    {
        return view('profile.vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserVehicle $vehicle): RedirectResponse
    {
        // todo: also check/ create the request
        $validated = $request->validate([
            'make' => ['required', 'string', 'max:255'],
            'model' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
            'registration_number' => ['required', 'string', 'max:255', 'unique:user_vehicles,registration_number,' . $vehicle->id],
        ]);
        $vehicle->update($validated);
        return redirect()
            ->route('profile.vehicles.index')
            ->with('success', 'Vehicle updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserVehicle $vehicle): RedirectResponse
    {
        $vehicle->delete();
        return redirect()
            ->route('profile.vehicles.index')
            ->with('success', 'Vehicle deleted successfully.');
    }
}
