<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeeklyNewsletterRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_newsletter_recipients', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('token')->nullable()->default(null);
            $table->string('email')->nullable()->default(null);
            $table->tinyInteger('is_verified')->nullable()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weekly_newsletter_recipients');
    }
}
