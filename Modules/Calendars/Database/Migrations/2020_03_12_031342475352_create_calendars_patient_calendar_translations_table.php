<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarsPatient_calendarTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars__patient_calendar_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('patient_calendar_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['patient_calendar_id', 'locale']);
            $table->foreign('patient_calendar_id')->references('id')->on('calendars__patient_calendars')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('calendars__patient_calendar_translations', function (Blueprint $table) {
            $table->dropForeign(['patient_calendar_id']);
        });
        Schema::dropIfExists('calendars__patient_calendar_translations');
    }
}
