<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class VehicleColor extends Model
{
    use HasTranslations;
    protected $fillable = ['name', 'hex_code'];
    public $translatable = ['name'];
    protected $casts = [
        'name' => 'array',
    ];



}
