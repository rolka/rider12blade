<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class VehicleAmenity extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = ['name', 'slug', 'icon'];
    public $translatable = ['name'];

    /**
     * The user vehicles that have this amenity.
     */
    public function userVehicles()
    {
        return $this->belongsToMany(UserVehicle::class, 'user_vehicle_amenity', 'vehicle_amenity_id', 'user_vehicle_id');
    }
}
