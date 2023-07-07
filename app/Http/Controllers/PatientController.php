<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Test;
use App\Models\Echantillon;
use App\Models\DemandeAnalyse;
use Illuminate\Database\Eloquent\Collection;
class PatientController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $patients = Patient::orderBy('date_created', 'DESC')->get();
        $demande = DemandeAnalyse::all();
        return view('Patients.index')->with(['patients' => $patients, 'demandes'=> $demande]);
    }

    public function store(Patient $patient, Request $request ) {

        //dd($request->input());
        $patient -> create([
            "nom" => $request->input("patient_surname"),
            "prenom" => $request->input("patient_name"),
            "sexe" => $request->input("sexe"),
            "date_naissance" => $request->input("date_birth")
        ]);
        $nbrEchant = $request->input("echant_nombre");
        $urgenceDemande = $request->input("urgence_demande");
        $allpat = Patient::all();
        $arraypat = $allpat -> modelKeys();
        $lastinsert = $arraypat[sizeof($arraypat)-1];
        //dd($lastinsert);
        $alltests = Test::all();
        $allechant = Echantillon::all();
        return view('Demandes.patientechant')->with(["echantNbr"=>$nbrEchant, "urg" =>$urgenceDemande, "patient"=>$lastinsert, "tests"=>$alltests, "echant" => $allechant]);
    }

    protected function getEchantType() {
        $echantillon = Echantillon::all();
        $echantOne = $echantillon[1]->nom_type;
        //dd($echantillon[0]);
        $echant = array();
        //$echantTest = array();
        array_push($echant , $echantOne);
        //$counter = 1;
        for($i=0 ; $i<sizeof($echantillon); $i++) {
            if($echantillon[$i]->nom_type == $echantOne) {
                //$test_assoc = $echantillon[$i]->test_associe;
                //$findTest = Test::find($test_assoc);
                //array_push($echantTest, $findTest->nom_test);
                
                //$counter++;
                //if($i == sizeof($echantillon)-1) {
                    //$echant[$echantillon[$i]->nom_type] = $echantTest;
                //}
                continue;
            } else {
                $echantOne = $echantillon[$i]->nom_type; 
                //$echant[$echantillon[$i-1]->nom_type] = $echantTest;
                //$echantTest = array();
                //$test_assoc = $echantillon[$i]->test_associe;
                //$findTest = Test::find($test_assoc);
                array_push($echant, $echantOne);
            }
        }

        return $echant;
    }
}
