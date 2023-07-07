


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEchantillonAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('echantillon_analyses', function (Blueprint $table) {
            $table->id('id_echantillon')->autoIncrement();
            $table->bigInteger('unique_id');
            $table->unsignedBigInteger('id_demande');
            $table->foreign('id_demande')->references('identifiant_demande')->on('demande_analyses');
            $table->unsignedBigInteger('echantillon_type');
            $table->foreign('echantillon_type')->references('identifiant_type')->on('echantillons');
            $table->integer('test_effectuer')->nullable($value=true);
            $table->unsignedBigInteger('resultat')->nullable();
            $table->foreign('resultat')->references('id_resultat')->on('resultat_analyses');
            $table->enum('status_echantillon', ['En cours', 'Termine'])->default("En cours");
            $table->dateTime('date_created')->useCurrent();
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
        Schema::dropIfExists('echantillon_analyses');
    }
}
