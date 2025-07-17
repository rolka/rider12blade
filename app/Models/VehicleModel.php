<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VehicleModel extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'code',
        'vehicle_make_id',
    ];

    public function make(): belongsTo
    {
        return $this->belongsTo(VehicleMake::class);
    }
}
