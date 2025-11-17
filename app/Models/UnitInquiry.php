<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitInquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_id',
        'full_name',
        'email',
        'phone',
        'message',
    ];

    // Relationship to Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
