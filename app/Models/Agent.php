<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'image',
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    // Optional computed attribute
    public function getListedUnitsCountAttribute()
    {
        return $this->units()->count();
    }
}
