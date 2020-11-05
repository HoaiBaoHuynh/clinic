<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreatmentListtreatmentTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treatment__listtreatment_translations', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            // Your translatable fields

            $table->integer('listtreatment_id')->unsigned();
            $table->string('locale')->index();
            $table->unique(['listtreatment_id', 'locale']);
            $table->foreign('listtreatment_id')->references('id')->on('treatment__listtreatments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('treatment__listtreatment_translations', function (Blueprint $table) {
            $table->dropForeign(['listtreatment_id']);
        });
        Schema::dropIfExists('treatment__listtreatment_translations');
    }
}
