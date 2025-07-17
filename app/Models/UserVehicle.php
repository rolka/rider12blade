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
        'number_of_seats',
        'vehicle_color_id',
        'photo',
        'license_plate',
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


}
