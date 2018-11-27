<?php

use Illuminate\Database\Seeder;
use App\Models\HealthRiskGroup;

class HealthRiskGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new HealthRiskGroup();
        $group->name = 'Old';
        $group->save();


        $group = new HealthRiskGroup();
        $group->name = 'Respiratory';
        $group->save();



        $group = new HealthRiskGroup();
        $group->name = 'Hearth';
        $group->save();


        $group = new HealthRiskGroup();
        $group->name = 'Child';
        $group->save();

        $group = new HealthRiskGroup();
        $group->name = 'None';
        $group->save();
    }
}
