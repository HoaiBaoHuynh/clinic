<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorListdoctorTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor__listdoctor_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('listdoctor_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['listdoctor_id', 'locale']);
            $table->foreign('listdoctor_id')->references('id')->on('doctor__listdoctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctor__listdoctor_translations', function (Blueprint $table) {
            $table->dropForeign(['listdoctor_id']);
        });
        Schema::dropIfExists('doctor__listdoctor_translations');
    }
}
