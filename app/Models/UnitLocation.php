<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitLocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'province',
        'city',
        'zip_code',
        'image',
    ];

    // Relationship: A location can have many units
    public function units()
    {
        return $this->hasMany(Unit::class, 'unit_location_id');
    }
}
