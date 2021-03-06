<?php

use Illuminate\Database\Seeder;
use App\Models\AirQualityRecording;
use Carbon\Carbon;
use App\Models\MonthlyAverageRecording;
use App\Models\HealthHazardLevel;

class MonthlyAverageRecordingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $recordings = AirQualityRecording::get();

        $recordings = $recordings->groupBy(function($d) {
            return Carbon::parse($d->taken_at)->format('m');
        });

        foreach ($recordings as $monthData)
        {
            $average = aqiAverage($monthData);
            $monthlyAverageRecording = new MonthlyAverageRecording();

            $monthlyAverageRecording->air_quality_index_average = $average;
            $monthlyAverageRecording->reading_id = 1;
            $monthlyAverageRecording->taken_at = Carbon::createFromTimeString($monthData[0]->taken_at)->format('Y-m-1 00:00:00');

            $healthHazardLevel = HealthHazardLevel::where('air_quality_index_lower_bound', '<=', $average)
                ->where('air_quality_index_upper_bound', '>=', $average)
                ->first();

            $monthlyAverageRecording->health_hazard_level_id = $healthHazardLevel->id;

            $monthlyAverageRecording->city_id = 1;

            $monthlyAverageRecording->save();
        }
    }
}
