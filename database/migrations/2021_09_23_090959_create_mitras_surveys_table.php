<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitrasSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitras_surveys', function (Blueprint $table) {
            $table->id();
            $table->string('mitra_id');
            $table->foreign('mitra_id')->references('email')->on('mitras')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('survey_id');
            $table->foreign('survey_id')->references('id')->on('surveys')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->unsignedBigInteger('assessment_id')->nullable();
            $table->foreign('assessment_id')->references('id')->on('assessments');
            $table->string('phone_survey', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitras_surveys');
    }
}
