<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthRiskGroupMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_risk_group_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('message')->nullable()->default(null);

            $table->unsignedInteger('health_risk_group_id')->nullable()->default(null);
            $table->foreign('health_risk_group_id')->references('id')->on('health_risk_groups');

            $table->unsignedInteger('health_hazard_level_id')->nullable()->default(null);
            $table->foreign('health_hazard_level_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_risk_group_messages');
    }
}
