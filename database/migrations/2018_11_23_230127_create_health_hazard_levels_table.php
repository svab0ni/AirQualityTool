<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthHazardLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_hazard_levels', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->text('precautionary_actions')->nullable()->default(null);
            $table->integer('air_quality_index_lower_bound')->nullable()->default(null);
            $table->integer('air_quality_index_upper_bound')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_hazard_levels');
    }
}
