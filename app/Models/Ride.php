<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ride extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'vehicle_id',
        'departure_id',
        'destination_id',
        'price',
        'available_seats',
        'date_time',
    ];
    public function userVehicle(): BelongsTo
    {
        return $this->belongsTo(UserVehicle::class, 'user_vehicle_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



}
