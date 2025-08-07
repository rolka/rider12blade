<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserVehicle extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'vehicle_make_id',
        'vehicle_model_id',
        'make_year',
        'vehicle_color_id',
        'photo'
    ];
    protected $casts = [
        // 'amenities' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function make(): BelongsTo
    {
        return $this->belongsTo(VehicleMake::class, 'vehicle_make_id');
    }
    public function model(): BelongsTo
    {
        return $this->belongsTo(VehicleModel::class, 'vehicle_model_id');
    }
    public function color(): BelongsTo
    {
        return $this->belongsTo(VehicleColor::class, 'vehicle_color_id');
    }

    /**
     * The amenities that belong to the user vehicle.
     */
    public function amenities()
    {
        return $this->belongsToMany(VehicleAmenity::class, 'user_vehicle_amenity', 'user_vehicle_id', 'vehicle_amenity_id');
    }

}
