<?php

namespace App\Models;

use App\Enums\RideStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'status',
    ];

    protected $casts = [
        'date_time' => 'datetime',
        'status' => RideStatus::class,
    ];

    public function userVehicle(): BelongsTo
    {
        return $this->belongsTo(UserVehicle::class, 'user_vehicle_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function departure(): BelongsTo
    {
        return $this->belongsTo(City::class, 'departure_id');
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(City::class, 'destination_id');
    }

    protected function dateOnly(): Attribute
    {
        return Attribute::get(fn () => optional($this->date_time)->format('Y-m-d'));
    }

    protected function timeOnly(): Attribute
    {
        return Attribute::get(fn () => optional($this->date_time)->format('H:i'));
    }

    protected function formattedPrice(): Attribute
    {
        return Attribute::get(function () {
            $symbol = config('currency.symbol', '€');
            $position = config('currency.position', 'after');

            $formatted = number_format($this->price, 2, config('currency.decimal_separator', '.'), config('currency.thousands_separator', ','));

            return $position === 'before'
                ? $symbol . ' ' . $formatted
                : $formatted . ' ' . $symbol;
        });
    }

    // Query scopes for convenience
    public function scopeScheduled($query)
    {
        return $query->where('status', RideStatus::Scheduled->value);
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', RideStatus::Completed->value);
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', RideStatus::Cancelled->value);
    }
}
