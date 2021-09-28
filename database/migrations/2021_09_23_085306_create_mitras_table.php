<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitras', function (Blueprint $table) {
            $table->string('email', 100);
            $table->primary('email');
            $table->string('code', 9);
            $table->string('name', 255);
            $table->string('nickname', 50);
            $table->enum('sex', ['L', 'P']);
            $table->text('photo');
            $table->unsignedBigInteger('education');
            $table->foreign('education')->references('id')->on('educations');
            $table->date('birtdate');
            $table->string('profession', 255);
            $table->text('address');
            $table->unsignedBigInteger('village');
            $table->foreign('village')->references('id')->on('villages');
            $table->unsignedBigInteger('subdistrict');
            $table->foreign('subdistrict')->references('id')->on('subdistricts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitras');
    }
}
