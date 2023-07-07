<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestAnalyse extends Model
{
    use HasFactory;

    protected $primaryKey = "id_echantillon";

    protected $guarded = [];


    public function appartEchantillon(){
        return $this-> belongsTo(EchantillonAnalyse::class, 'id_echant_analyse');
    }

    public function testEffectuer() {
        return $this->belongsTo(Test::class, 'test_effectuer');
    }
}
