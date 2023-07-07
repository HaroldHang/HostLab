<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeAnalyse;
use App\Models\Patient;
use App\Models\EchantillonAnalyse;

class DashboardController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {

        $patients = sizeof(Patient::all());
        $totalDemande = sizeof(DemandeAnalyse::where('status_demande', 'En cours')->get());
        $demandes = sizeof(DemandeAnalyse::all());
        $totalEchantillon = sizeof(EchantillonAnalyse::where('status_echantillon', 'En cours')->get());
        $echantillons = sizeof(EchantillonAnalyse::all());
        //dd(sizeof($patients));
        return view('Dashboard.index')->with(["patients"=>$patients,"demandes"=>$totalDemande, "echantillon"=>$totalEchantillon , "totDemandes" => $demandes, "totEchantillons" => $echantillons]);
    }
}
