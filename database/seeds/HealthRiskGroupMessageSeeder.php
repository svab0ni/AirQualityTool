<?php

use Illuminate\Database\Seeder;
use App\Models\HealthRiskGroupMessage;

class HealthRiskGroupMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $message = new HealthRiskGroupMessage();

        $message->message = '';
        $message->health_risk_group_id = '';
        $message->health_hazard_level_id = '';
    }
}
