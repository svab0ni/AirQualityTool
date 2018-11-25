<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyAverageRecordingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_average_recordings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('air_quality_index_average')->nullable()->default(null);
            $table->timestamp('taken_at')->nullable()->default(null);

            $table->unsignedInteger('reading_id');
            $table->foreign('reading_id')->references('id')->on('readings');

            $table->unsignedInteger('health_hazard_level_id');
            $table->foreign('health_hazard_level_id')->references('id')->on('health_hazard_levels');

            $table->unsignedInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_average_recordings');
    }
}
