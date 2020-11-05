<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientReportTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient__report_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('report_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['report_id', 'locale']);
            $table->foreign('report_id')->references('id')->on('patient__reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient__report_translations', function (Blueprint $table) {
            $table->dropForeign(['report_id']);
        });
        Schema::dropIfExists('patient__report_translations');
    }
}
