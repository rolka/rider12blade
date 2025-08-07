<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            // 'model' => ['required', 'string', 'max:255'],
            // 'make' => ['required', 'string', 'max:255'],
            // 'color' => ['required', 'string', 'max:255'],

            // Validate IDs for make, model, and color
            'vehicle_make_id' => ['required', 'integer', Rule::exists('vehicle_makes', 'id')],
            // 'make' => ['required', 'integer', Rule::exists('vehicle_makes', 'id')],

            // 'vehicle_model_id' => ['required', 'integer', Rule::exists('vehicle_models', 'id')],
            'model' => ['required', 'integer', Rule::exists('vehicle_models', 'id')],
            'vehicle_color_id' => ['required', 'integer', Rule::exists('vehicle_colors', 'id')],

            'make_year' => ['required', 'integer', 'min:1900', 'max:' . ((int)date('Y') + 1)],
            // 'number_of_seats' => [ 'exclude_if:number_of_seats,null', Rule::excludeIf($this->number_of_seats === null), 'nullable', 'integer', 'min:1', 'max:7'], // Added based on your migration
            // 'license_plate' => ['string', 'max:20', 'unique:user_vehicles,license_plate'],

            // 'amenities' => ['nullable', 'array'], // Amenities are optional, and should be an array
            // 'amenities.*' => ['string', 'max:255'], // Validate each item in the amenities array

            'amenities' => ['nullable', 'array'], // Amenities are optional, and should be an array of IDs
            // Validate that each amenity ID exists in the 'amenities' table
            'amenities.*' => ['integer', Rule::exists('vehicle_amenities', 'id')],
            // 'vehicle_photo' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'], // Max 2MB
            // 'vehicle_photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
        ];
        // Conditionally modify the 'vehicle_photo' rule based on the request method
        if ($this->isMethod('put')) {
            // For updates, the photo is optional
            $rules['vehicle_photo'] = ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'];
        } else {
            // For new vehicles, the photo is required
            $rules['vehicle_photo'] = ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'];
        }
        return $rules;
    }

    public function validated($key = null, $default = null)
    {
        return array_merge(
            parent::validated(),
            ['vehicle_model_id' => $this->input('model')]
        );
    }
    protected function prepareForValidation(): void
    {
        $this->merge([
            'vehicle_make_id' => $this->input('make'),
            // 'vehicle_model_name' => $this->input('model'),
            // 'production_year' => $this->input('year'),
        ]);
    }

    /**
     * Gathers all the data needed to create the UserVehicle model.
     * It handles the file upload and returns a clean array.
     */
    public function getVehicleCreationData(): array
    {
        // Start with the validated data
        $validated = $this->validated();

        $data = [
            'make' => $validated['make'],
            'model' => $validated['model'],
            'color' => $validated['color'],
            'year' => $validated['year'],
            'registration_number' => $validated['registration_number'],
            'photo' => null, // Default to null
        ];

        // Handle the file upload within the request class
        if ($this->hasFile('vehicle_photo')) {
            $path = $this->file('vehicle_photo')->store('vehicle_photos', 'public');
            $data['photo'] = $path;
        }

        return $data;
    }
    /**
     * Returns a clean array of amenity IDs.
     */
    public function getAmenityIds(): array
    {
        // Return the validated amenities, or an empty array if none were submitted.
        return $this->validated('amenities', []);
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'vehicle_make_id.required' => 'The vehicle make is required.',
            'vehicle_make_id.integer' => 'The vehicle make must be a valid ID.',
            'vehicle_make_id.exists' => 'The selected vehicle make is invalid.',

            'vehicle_model_id.required' => 'The vehicle model is required.',
            'vehicle_model_id.integer' => 'The vehicle model must be a valid ID.',
            'vehicle_model_id.exists' => 'The selected vehicle model is invalid.',

            'vehicle_color_id.required' => 'The vehicle color is required.',
            'vehicle_color_id.integer' => 'The vehicle color must be a valid ID.',
            'vehicle_color_id.exists' => 'The selected vehicle color is invalid.',

            'make_year.required' => 'The manufacturing year is required.',
            'make_year.integer' => 'The manufacturing year must be a number.',
            'make_year.min' => 'The manufacturing year must be at least 1900.',
            'make_year.max' => 'The manufacturing year cannot be in the future.',

            'number_of_seats.required' => 'The number of seats is required.',
            'number_of_seats.integer' => 'The number of seats must be an integer.',
            'number_of_seats.min' => 'The number of seats must be at least 1.',
            'number_of_seats.max' => 'The number of seats cannot exceed 50.',

            'license_plate.required' => 'The license plate is required.',
            'license_plate.unique' => 'This license plate is already registered.',
            'license_plate.max' => 'The license plate may not be greater than 20 characters.',

            'amenities.*.integer' => 'Invalid amenity selected.',
            'amenities.*.exists' => 'The selected amenity is invalid.',

            'vehicle_photo.image' => 'The uploaded file must be an image.',
            'vehicle_photo.mimes' => 'The vehicle photo must be a file of type: jpeg, png, jpg, gif, svg.',
            'vehicle_photo.max' => 'The vehicle photo may not be greater than 2MB.',
        ];
    }
}
