<?php

use Illuminate\Database\Seeder;
use App\Models\HealthHazardLevel;

class HealthHazardLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $healthHazardLevel = new HealthHazardLevel();

        $healthHazardLevel->name = 'Good';
        $healthHazardLevel->description = 'Little to no risk.';
        $healthHazardLevel->precautionary_actions = 'None.';
        $healthHazardLevel->air_quality_index_lower_bound = 0;
        $healthHazardLevel->air_quality_index_upper_bound = 50;
        $healthHazardLevel->color = '#aed581';

        $healthHazardLevel->save();

        $healthHazardLevel = new HealthHazardLevel();

        $healthHazardLevel->name = 'Moderate';
        $healthHazardLevel->description = 'Unusually sensitive individuals may experience respiratory symptoms.';
        $healthHazardLevel->precautionary_actions = 'Unusually sensitive people should consider reducing prolonged or heavy exertion.';
        $healthHazardLevel->air_quality_index_lower_bound = 51;
        $healthHazardLevel->air_quality_index_upper_bound = 100;
        $healthHazardLevel->color = '#4dd0e1';

        $healthHazardLevel->save();

        $healthHazardLevel = new HealthHazardLevel();

        $healthHazardLevel->name = 'Unhealthy for Sensitive Groups';
        $healthHazardLevel->description = 'Increasing likelihood of respiratory symptoms in sensitive individuals, aggravation of heart or lung disease and premature mortality in persons with cardiopulmonary disease and the elderly.';
        $healthHazardLevel->precautionary_actions = 'People with respiratory or heart disease, the elderly and children should limit prolonged exertion.';
        $healthHazardLevel->air_quality_index_lower_bound = 101;
        $healthHazardLevel->air_quality_index_upper_bound = 150;
        $healthHazardLevel->color = '#fff176';

        $healthHazardLevel->save();

        $healthHazardLevel = new HealthHazardLevel();

        $healthHazardLevel->name = 'Unhealthy';
        $healthHazardLevel->description = 'Increased aggravation of heart or lung disease and premature mortality in persons with cardiopulmonary disease and the elderly; increased respiratory effects in general population.';
        $healthHazardLevel->precautionary_actions = 'People with respiratory or heart disease, the elderly and children should avoid prolonged exertion; everyone else should limit prolonged exertion.';
        $healthHazardLevel->air_quality_index_lower_bound = 151;
        $healthHazardLevel->air_quality_index_upper_bound = 200;
        $healthHazardLevel->color = '#ff8a65';

        $healthHazardLevel->save();

        $healthHazardLevel = new HealthHazardLevel();

        $healthHazardLevel->name = 'Very Unhealthy';
        $healthHazardLevel->description = 'Significant aggravation of heart or lung disease and premature mortality in persons with cardiopulmonary disease and the elderly; significant increase in respiratory effects in general population.';
        $healthHazardLevel->precautionary_actions = 'People with respiratory or heart disease, the elderly and children should avoid any outdoor activity; everyone else should avoid prolonged exertion.';
        $healthHazardLevel->air_quality_index_lower_bound = 201;
        $healthHazardLevel->air_quality_index_upper_bound = 300;
        $healthHazardLevel->color = '#ba68c8';

        $healthHazardLevel->save();

        $healthHazardLevel = new HealthHazardLevel();

        $healthHazardLevel->name = 'Hazardous';
        $healthHazardLevel->description = 'Serious aggravation of heart or lung disease and premature mortality in persons with cardiopulmonary disease and the elderly; serious risk of respiratory effects in general population.';
        $healthHazardLevel->precautionary_actions = 'Everyone should avoid any outdoor exertion; people with respiratory or heart disease, the elderly and children should remain indoors.';
        $healthHazardLevel->air_quality_index_lower_bound = 301;
        $healthHazardLevel->air_quality_index_upper_bound = 500;
        $healthHazardLevel->color = '#ef5350';

        $healthHazardLevel->save();
    }
}
