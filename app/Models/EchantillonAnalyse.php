<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EchantillonAnalyse extends Model
{
    use HasFactory;

    protected $primaryKey = "id_echantillon";

    protected $guarded = [];
    
    public function demandeAnalyse() {
        $this->belongsTo(DemandeAnalyse::class, 'id_demande');
    }

    public function testAnalyses() {
        return $this->hasMany(TestAnalyse::class, 'test_effectuer');
    }

    public function echantillonType() {
        return $this->hasOne(Echantillon::class, 'identifiant_type');
    }

    public function resultatEchantillon() {
        return $this->hasOne(ResultatAnalyse::class, 'id_resultat');
    } 

}
