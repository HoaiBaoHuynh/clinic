<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientListpatientTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient__listpatient_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('listpatient_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['listpatient_id', 'locale']);
            $table->foreign('listpatient_id')->references('id')->on('patient__listpatients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patient__listpatient_translations', function (Blueprint $table) {
            $table->dropForeign(['listpatient_id']);
        });
        Schema::dropIfExists('patient__listpatient_translations');
    }
}
