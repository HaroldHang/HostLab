<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeAnalyse extends Model
{
    use HasFactory;

    protected $primaryKey = "identifiant_demande";

    protected $guarded = [];

    public function echantillonsAnalyse() {
        return $this->hasMany(EchantillonAnalyse::class, 'id_demande');
    }

    public function patient() {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
