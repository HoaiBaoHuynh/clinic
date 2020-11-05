<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorCalendarTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor__calendar_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('calendar_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['calendar_id', 'locale']);
            $table->foreign('calendar_id')->references('id')->on('doctor__calendars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor__calendar_translations', function (Blueprint $table) {
            $table->dropForeign(['calendar_id']);
        });
        Schema::dropIfExists('doctor__calendar_translations');
    }
}
