<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DemandeAnalyse;
use App\Models\Patient;
use App\Models\EchantillonAnalyse;
use App\Models\Echantillon;
use App\Models\ResultatAnalyse;
use App\Models\User;
class DemandeAnalyseController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        //dd(auth()->user()->);
        $demandes = DemandeAnalyse::orderBy('date_created','DESC')->get();
        $users = User::all();
        $patientArray = array();
        $resultatArray = array();
        foreach ($demandes as $patientDemande) {
            $patient = Patient::find($patientDemande->patient_id);
            array_push($patientArray, $patient);
            $echantillons = EchantillonAnalyse::where('id_demande', $patientDemande->identifiant_demande)->get(); 
            $resultat = "";
            $i = 0;
           
            foreach($echantillons as $echantillon) {
                $resultatEchantillon = ResultatAnalyse::find($echantillon->id_echantillon);
                //dd($echantillon->unique_id);
                if($resultatEchantillon != null) {
                    
                    $echantillonId = "<span>Echantillon " . $echantillon->unique_id . " (". Echantillon::find($echantillon->echantillon_type)->nom_type.")</span> <br>";
                    $resultatText = "<p>" . $resultatEchantillon->intepretation . "</p>";
                    $newResultat = "<p>" . $echantillonId . $resultatText .  "</p> <br>";
                    $resultat .= $newResultat;
                }
            }
            array_push($resultatArray, $resultat);
            
        }
        //dd($resultatArray);
        return view('Demandes.index')->with(["demandes" => $demandes, "patients" => $patientArray, "resultats" => $resultatArray, "technicians" => $users]);
    }

    public function create() {
        return view('Demandes.patientadd');
    }

    public function newPatient() {
        return view('Demandes.newpatient');
    }
}
