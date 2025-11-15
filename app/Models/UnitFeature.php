<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'feature_name',
    ];

    // Relationship with Unit
    public function units()
    {
        return $this->belongsToMany(Unit::class, 'unit_features_unit', 'unit_feature_id', 'unit_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
