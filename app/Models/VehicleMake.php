<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VehicleMake extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'code',
        'logo',
    ];

    public function models(): HasMany
    {
        return $this->hasMany(VehicleModel::class);
    }


}
