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
            $table->string('mitras_id');
            $table->foreign('mitras_id')->references('email')->on('mitras');
            $table->unsignedBigInteger('surveys_id');
            $table->foreign('surveys_id')->references('id')->on('surveys');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statusses');
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
