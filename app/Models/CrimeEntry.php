<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrimeEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'crime_type',
        'location',
        'incident_time',
        'email',
        'photo_evidence',
        'car_type',
        'car_color',
        'car_year',
        'taken_items',
        'building_entry_method',
        'other_notes',
        'status',
    ];

    protected $casts = [
        'incident_time' => 'datetime',
        'status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
