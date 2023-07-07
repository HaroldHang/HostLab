<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $primaryKey = "identifiant_patient";

    protected $guarded = [];

    public function analyseDemandes() {
        return $this -> hasMany(DemandeAnalyse::class, 'patient_id');
    }

}
