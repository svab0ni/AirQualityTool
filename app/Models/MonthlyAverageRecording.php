<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyAverageRecording extends Model
{
    protected $fillable = [
        'air_quality_index_average',
        'reading_id',
        'health_hazard_level_id',
        'city_id',
        'taken_at',
    ];
}
