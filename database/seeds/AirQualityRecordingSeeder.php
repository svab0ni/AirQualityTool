<?php

use Illuminate\Database\Seeder;
use App\Models\AirQualityRecording;
use App\Models\HealthHazardLevel;
use GuzzleHttp\Client;

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
        $client = new Client();
        $response = $client->request('GET', 'http://dosairnowdata.org/dos/RSS/Sarajevo/Sarajevo-PM2.5.xml')->getBody();

        $xml = simplexml_load_string($response);
        $json = json_encode($xml);
        $data = json_decode($json,TRUE);

        $data =  $data['channel']['item'];

        foreach ($data as $recording)
        {
            $airQualityIndexRecording = new AirQualityRecording();
            
            $airQualityIndexRecording->air_quality_index = $recording['AQI'];
            $airQualityIndexRecording->reading_id = 1;
            $airQualityIndexRecording->taken_at = $recording['ReadingDateTime'];

            $healthHazardLevel = HealthHazardLevel::where('name', $recording['Desc'])->first();
            $airQualityIndexRecording->health_hazard_level_id = $healthHazardLevel->id;

            $airQualityIndexRecording->city_id = 1;

            $airQualityIndexRecording->save();
        }
    }
}
