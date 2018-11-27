<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthRiskGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_risk_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name')->nullable()->default(null);
        });

        Schema::create('health_risk_groups_users', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('health_risk_group_id')->nullable()->default(null);
            $table->foreign('health_risk_group_id')->references('id')->on('health_risk_groups');

            $table->unsignedInteger('user_id')->nullable()->default(null);
            $table->foreign('user_id')->references('id')->on('users');


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_risk_groups');
    }
}
