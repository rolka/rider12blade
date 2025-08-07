<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserVehicleRequest;
use App\Models\UserVehicle;
use App\Models\VehicleAmenity;
use App\Models\VehicleColor;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
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
        $vehicles = auth()->user()->vehicles()->with([
            'user', 'make', 'model', 'color', 'amenities',
        ])->latest()->paginate(20);
        return view('profile.vehicles.index', compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // $locale = App::getLocale();
        // $colors = VehicleColor::orderByRaw("JSON_UNQUOTE(JSON_EXTRACT(name, '$.\"$locale\"')) ASC")->get();
        // $colors = VehicleColor::orderBy('name')->get();

        // $colors = VehicleColor::get()->sortBy(function($color) {
        //     return $color->getTranslation('name', App::getLocale());
        // });

        // $vehicleMakes = VehicleMake::orderBy('name')->get();
        // $vehicleMakes = Cache::rememberForever('vehicle_makes', function () {
        //     return VehicleMake::orderBy('name')->select('id', 'name')->get();
        // });
        // // $vehicleModels = VehicleModel::orderBy('name')->get();
        // $vehicleModels = Cache::rememberForever('vehicle_models', function () {
        //     return VehicleModel::orderBy('name')->select('id', 'name')->get();
        // });
        // $vehicleColors = VehicleColor::orderByTranslation('name', App::getLocale())->get();
        // $amenities = VehicleAmenity::all(); // Get all available amenities
        // $vehicle = new UserVehicle();

        // return view('profile.vehicles.create', compact(
        //     'vehicleColors',
        //     'amenities',
        //     'vehicleMakes',
        //     'vehicleModels',
        //     'vehicle',
        // ));
        $vehicle = new UserVehicle();
        return view('profile.vehicles.create', compact('vehicle'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserVehicleRequest $request): RedirectResponse
    {
        // dd($request->all());

        // dd($request->all());
        $validatedData = $request->validated();
        // dd($validatedData);
        // $vehicle = new UserVehicle();

        // Check if the key 'number_of_seats' exists in the validated data array
        // if (!array_key_exists('number_of_seats', $validatedData)) {
            // If it doesn't exist, add it with a null value
            // $validatedData['number_of_seats'] = null;
        // }

        // Assign validated data to the vehicle properties
        // $vehicle->model = $validatedData['model'];
        // $vehicle->make = $validatedData['make'];
        // $vehicle->color = $validatedData['color'];
        // $vehicle->year = $validatedData['year'];
        // // Amenities will be an array (or empty array if none selected)
        // // Store amenities as JSON, assuming your database column is text/JSON type
        // $vehicle->amenities = json_encode($validatedData['amenities'] ?? []);

        // Handle the file upload
        // if ($request->hasFile('vehicle_photo')) {
        //     $path = $request->file('vehicle_photo')->store('vehicle_photos', 'public');
        //     // Save the path to the vehicle instance
        //     $vehicle->photo_path = $path;
        // }

        // todo: make form validations in request!
        // $validated = $request->validate([
        //     'make' => ['required', 'string', 'max:255'],
        //     'model' => ['required', 'string', 'max:255'],
        //     'year' => ['required', 'integer', 'min:1900', 'max:' . (date('Y') + 1)],
        //     'registration_number' => ['required', 'string', 'max:255', 'unique:user_vehicles'],
        // ]);

        // Handle the file upload and add path to validated data
        if ($request->hasFile('vehicle_photo')) {
            $path = $request->file('vehicle_photo')->store('vehicle_photos', 'public');
            $validatedData['photo'] = $path; // Add photo_path to the validated data
        } else {
            $validatedData['photo'] = null; // Ensure photo_path is null if no file uploaded
        }

        // Extract amenities IDs before creating the vehicle, as they are handled separately
        $amenityIds = $validatedData['amenities'] ?? [];
        unset($validatedData['amenities']); // Remove amenities from $validatedData before creating the vehicle

        // Create the vehicle associated with the authenticated user
        // $validatedData['amenities'] = json_encode($validatedData['amenities'] ?? []);

        // Auth::user()->vehicles()->create($validatedData);

        // $dataToCreate = array_merge($validatedData, [
        //     'vehicle_make_id' => $request->input('make'),
        // ]);

        // $vehicle->save();
        // auth()->user()->vehicles()->create($validatedData);
        // $vehicle = auth()->user()->vehicles()->create($dataToCreate);
        $vehicle = auth()->user()->vehicles()->create($validatedData);
        $vehicle->amenities()->sync($amenityIds);

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
        // // $vehicleMakes = VehicleMake::orderBy('name')->get();
        // $vehicleMakes = Cache::rememberForever('vehicle_makes', function () {
        //     return VehicleMake::orderBy('name')->select('id', 'name')->get();
        // });
        // // $vehicleModels = VehicleModel::orderBy('name')->get();
        // $vehicleModels = Cache::rememberForever('vehicle_models', function () {
        //     return VehicleModel::orderBy('name')->select('id', 'name')->get();
        // });
        // $vehicleColors = VehicleColor::orderByTranslation('name', App::getLocale())->get();
        // $amenities = VehicleAmenity::all(); // Get all available amenities
        // $vehicle = new UserVehicle();

        // return view('profile.vehicles.create', compact(
        //     'vehicleColors',
        //     'amenities',
        //     'vehicleMakes',
        //     'vehicleModels',
        //     'vehicle',
        // ));

        return view('profile.vehicles.create', compact('vehicle'));

        // return view('profile.vehicles.edit', compact('vehicle'));
        // return view('profile.vehicles.show', compact('vehicle'));
        // return view('profile.vehicles.create', compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUserVehicleRequest $request, UserVehicle $vehicle): RedirectResponse
    {
        $validatedData = $request->validated();

        // Correct photo update logic
        if ($request->hasFile('vehicle_photo')) {
            // Delete old photo from storage if it exists
            if ($vehicle->vehicle_photo) {
                Storage::disk('public')->delete($vehicle->vehicle_photo);
            }

            // Store the new photo
            $path = $request->file('vehicle_photo')->store('vehicle_photos', 'public');
            $validatedData['vehicle_photo'] = $path;
        } else {
            // Remove the photo from the validated data so it isn't set to null
            unset($validatedData['vehicle_photo']);
        }

        // Handle amenities, which are not part of the vehicle's main columns
        $amenityIds = $validatedData['amenities'] ?? [];
        unset($validatedData['amenities']);

        // Update the vehicle model with the validated data
        $vehicle->update($validatedData);

        // Sync the amenities relationship
        $vehicle->amenities()->sync($amenityIds);

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
