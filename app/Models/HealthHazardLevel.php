<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthHazardLevel extends Model
{
    protected $fillable = [
        'name',
        'description',
        'precautionary_actions',
        'air_quality_index_lower_bound',
        'air_quality_index_upper_bound'
    ];
}
