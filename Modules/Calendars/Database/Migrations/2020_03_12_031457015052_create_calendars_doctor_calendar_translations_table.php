<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarsDoctor_calendarTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars__doctor_calendar_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('doctor_calendar_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['doctor_calendar_id', 'locale']);
            $table->foreign('doctor_calendar_id')->references('id')->on('calendars__doctor_calendars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calendars__doctor_calendar_translations', function (Blueprint $table) {
            $table->dropForeign(['doctor_calendar_id']);
        });
        Schema::dropIfExists('calendars__doctor_calendar_translations');
    }
}
