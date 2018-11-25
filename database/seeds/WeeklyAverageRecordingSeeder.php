<?php

use Illuminate\Database\Seeder;
use App\Models\AirQualityRecording;
use Carbon\Carbon;
use App\Models\HealthHazardLevel;
use App\Models\WeeklyAverageRecording;

class WeeklyAverageRecordingSeeder extends Seeder
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
            $monthData = $monthData->groupBy(function($d) {
                return Carbon::parse($d->taken_at)->weekNumberInMonth;
            });

            foreach ($monthData as $weekData)
            {
                $average = aqiAverage($weekData);
                $weeklyAverageRecording = new WeeklyAverageRecording();

                $weeklyAverageRecording->air_quality_index_average = $average;
                $weeklyAverageRecording->reading_id = 1;
                $weeklyAverageRecording->taken_at = Carbon::createFromTimeString($weekData[0]->taken_at)->format('Y-m-d 00:00:00');

                $healthHazardLevel = HealthHazardLevel::where('air_quality_index_lower_bound', '<=', $average)
                    ->where('air_quality_index_upper_bound', '>=', $average)
                    ->first();

                $weeklyAverageRecording->health_hazard_level_id = $healthHazardLevel->id;

                $weeklyAverageRecording->city_id = 1;

                $weeklyAverageRecording->save();
            }

        }
    }
}
