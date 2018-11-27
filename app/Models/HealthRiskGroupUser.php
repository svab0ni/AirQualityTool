<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthRiskGroupUser extends Model
{
    protected $table = 'health_risk_groups_users';

    protected $fillable = [
        'user_id',
        'health_risk_group_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function healthRiskGroup()
    {
        return $this->belongsTo(HealthRiskGroup::class, 'health_risk_group_id');
    }
}
