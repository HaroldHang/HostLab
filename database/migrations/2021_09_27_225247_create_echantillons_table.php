<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEchantillonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('echantillons', function (Blueprint $table) {
            $table->id('identifiant_type')->autoIncrement();
            $table->string('nom_type', 255);
            // $table->unsignedBigInteger('test_associe')->nullable();
            // $table->foreign('test_associe')->references('identifiant_test')->on('tests');
            $table->text("description_echantillon")->nullable();
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
        Schema::dropIfExists('echantillons');
    }
}
