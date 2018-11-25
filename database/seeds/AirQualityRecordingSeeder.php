<?php

use Illuminate\Database\Seeder;
use App\Models\AirQualityRecording;
use App\Models\HealthHazardLevel;
use GuzzleHttp\Client;
use Carbon\CarbonPeriod;
use Carbon\Carbon;

class AirQualityRecordingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function run()
    {
//        $client = new Client();
//        $response = $client->request('GET', 'http://dosairnowdata.org/dos/RSS/Sarajevo/Sarajevo-PM2.5.xml')->getBody();
//
//        $xml = simplexml_load_string($response);
//        $json = json_encode($xml);
//        $data = json_decode($json,TRUE);
//
//        $data =  $data['channel']['item'];

        $period = CarbonPeriod::create(Carbon::now()->subMonths(8), '1 hour' ,Carbon::now());

        foreach ($period as $key => $date)
        {
            $airQualityIndexRecording = new AirQualityRecording();

            $aqi = rand(20, 350);
            $airQualityIndexRecording->air_quality_index = $aqi;
            $airQualityIndexRecording->reading_id = 1;
            $airQualityIndexRecording->taken_at = $date->format('Y-m-d H:00:00');

            $healthHazardLevel = HealthHazardLevel::where('air_quality_index_lower_bound', '<=', $aqi)
                ->where('air_quality_index_upper_bound', '>=', $aqi)
                ->first();

            $airQualityIndexRecording->health_hazard_level_id = $healthHazardLevel->id;

            $airQualityIndexRecording->city_id = 1;

            $airQualityIndexRecording->save();
        }
    }
}
