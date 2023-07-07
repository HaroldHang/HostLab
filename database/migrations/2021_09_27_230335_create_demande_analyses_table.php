<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandeAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::create('demande_analyses', function (Blueprint $table) {
            $table->id('identifiant_demande')->autoIncrement();
            $table->integer('nbr_echantillon');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('identifiant_patient')->on('patients');
            $table->dateTime('date_created')->useCurrent();
            $table->date('date_delivrance')->nullable();
            $table->enum('priorite', ['Urgent','Tres Urgent', 'Non Urgent'])->default("Non Urgent");
            $table->enum('status_demande',['En cours', 'Termine'])->default("En cours");
            $table->unsignedBigInteger('technicien_id')->nullable();
            $table->foreign('technicien_id')->references('identifiant_user')->on('users');
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
        Schema::dropIfExists('demande_analyses');
    }
}
