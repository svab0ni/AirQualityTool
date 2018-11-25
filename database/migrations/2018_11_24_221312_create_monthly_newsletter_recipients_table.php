<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyNewsletterRecipientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_newsletter_recipients', function (Blueprint $table) {
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
        Schema::dropIfExists('monthly_newsletter_recipients');
    }
}
