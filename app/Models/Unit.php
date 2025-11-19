<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'sqm',
        'location_text',
        'location_embedded',
        'price',
        'price_status',
        'status',
        'agent_id',
        'unit_type_id',
        'unit_location_id',
        'barangay',
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

    public function location()
    {
        return $this->belongsTo(UnitLocation::class, 'unit_location_id');
    }

    public function images()
    {
        return $this->hasMany(UnitImage::class);
    }

    public function features()
    {
        return $this->belongsToMany(UnitFeature::class, 'unit_features_unit', 'unit_id', 'unit_feature_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }

    public function inquiries()
    {
        return $this->hasMany(UnitInquiry::class);
    }
}
