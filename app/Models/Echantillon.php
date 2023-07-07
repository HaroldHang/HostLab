<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Echantillon extends Model
{
    use HasFactory;

    protected $primaryKey = "identifiant_type";

    protected $guarded = [];

    
    public function echantillonAnalyses() {
        return $this->belongsTo(EchantillonAnalyse::class, 'echantillon_type');
    }
    
}
