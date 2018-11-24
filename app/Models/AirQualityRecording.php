<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AirQualityRecording extends Model
{
    protected $fillable = [
        'air_quality_index',
        'reading_id',
        'health_hazard_level_id',
        'city_id',
        'taken_at',
    ];

    public function healthHazardLevel()
    {
        return $this->belongsTo(HealthHazardLevel::class, 'health_hazard_level_id');
    }

    public function reading()
    {
        return $this->belongsTo(Reading::class, 'reading_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
