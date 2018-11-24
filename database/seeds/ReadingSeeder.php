<?php

use Illuminate\Database\Seeder;
use App\Models\Reading;

class ReadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reading = new Reading();

        $reading->name = 'PM2.5 - Principal';

        $reading->save();
    }
}
