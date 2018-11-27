<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthRiskGroupMessage extends Model
{
    protected $fillable = [
        'message',
        'health_risk_group_id',
        'health_hazard_level_id'
    ];

    public function healthHazardLevel()
    {
        return $this->belongsTo(HealthHazardLevel::class, 'health_hazard_level_id');
    }

    public function healthRiskGroup()
    {
        return $this->belongsTo(HealthRiskGroup::class, 'health_risk_group_id');
    }
}
