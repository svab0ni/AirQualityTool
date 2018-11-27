<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthRiskGroup extends Model
{
    protected $fillable = [
        'name'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'health_risk_groups_users', 'user_id', 'health_risk_group_id');
    }
}
