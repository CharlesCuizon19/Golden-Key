<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'sqm',
        'location_text',
        'location_embedded',
        'bedroom',
        'bathrooms',
        'price',
        'status',
        'agent_id',
        'unit_type_id',
    ];

    // Relationships
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function type()
    {
        return $this->belongsTo(UnitType::class, 'unit_type_id');
    }

    public function images()
    {
        return $this->hasMany(UnitImage::class);
    }
}
