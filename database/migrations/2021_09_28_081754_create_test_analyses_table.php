<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_analyses', function (Blueprint $table) { 
            $table->id('testana')->autoIncrement();
            $table->unsignedBigInteger('id_echant_analyse')->nullable();
            $table->foreign('id_echant_analyse')->references('id_echantillon')->on('echantillon_analyses');
            $table->unsignedBigInteger('test_effectuer')->nullable();
            $table->foreign('test_effectuer')->references('identifiant_test')->on('tests');
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
        Schema::dropIfExists('test_analyses');
    }
}