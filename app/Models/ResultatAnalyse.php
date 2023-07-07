<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultatAnalyse extends Model
{
    use HasFactory;

    protected $primaryKey = "id_resultat";

    protected $guarded = [];
    
    public function echantillonResultat() {
        return $this -> belongsTo(EchantillonAnalyse::class, 'resultat');
    }

    
}
