<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ReadingSeeder::class);
        $this->call(HealthHazardLevelSeeder::class);
        $this->call(AirQualityRecordingSeeder::class);
        $this->call(MonthlyAverageRecordingSeeder::class);
        $this->call(WeeklyAverageRecordingSeeder::class);
    }
}
