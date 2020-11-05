<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorReportTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor__report_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('report_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['report_id', 'locale']);
            $table->foreign('report_id')->references('id')->on('doctor__reports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor__report_translations', function (Blueprint $table) {
            $table->dropForeign(['report_id']);
        });
        Schema::dropIfExists('doctor__report_translations');
    }
}
