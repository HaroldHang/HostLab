<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $primaryKey = "identifiant_test";

    protected $guarded = [];

    public function typeEchantillon() {
        return $this -> hasMany(Echantillon::class, 'test_associe');
    }

}
