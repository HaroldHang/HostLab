<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\EchantillonAnalyse;
use App\Models\Echantillon;
use App\Models\DemandeAnalyse;
use App\Models\Patient;
use App\Models\ResultatAnalyse;

class EchantillonAnalyseController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $echantillonAnalyse = EchantillonAnalyse::orderBy('date_created', 'DESC')->get();
        $echantillonType = Echantillon::all();
        //dd($echantillonType[$echantillonAnalyse[6]->echantillon_type - 1]->nom_type);
        return view('Echantillons.index')->with(['echantillons' => $echantillonAnalyse, 'nature' => $echantillonType]);
        
    }
    
    public function store(Request $request) {
        // Create the demande 
        //dd($request->input());
        $size = (sizeof($request->input())-3)/2;
        $demande = DemandeAnalyse::create([
            "nbr_echantillon" => $size,
            "patient_id" => $request->input("currentPatient"),
            "date_delivrance" => "2021-12-12",
            "priorite" => $request->input("urgDemande"),
            "technicien_id" => auth()->user()->identifiant_user
        ]);
        for ($i=1; $i <= $size; $i++) { 
            $uniq = rand(153, 800);
            //dd($request->input("echantTest" . $i));
            $testSize = sizeof($request->input("echantTest" . $i));
            $echant = $demande -> echantillonsAnalyse()-> create([
                "unique_id" => $uniq,
                "echantillon_type" => $request->input("echant" . $i),
                "test_effectuer" => sizeof($request->input("echantTest" . $i)),
                //"resultat" => 5,
            ]);
            
            for ($j=0; $j < $testSize; $j++) { 
                $test = $echant -> testAnalyses() -> create([
                    "test_effectuer" => $request -> input("echantTest" . $i . "[" . $j . "]")
                ]);
            }
            
        };

        //dd(DemandeAnalyse::all());
        return redirect(route('demande.index'));
    }

    public function edit(EchantillonAnalyse $echant_now) {
        $echant = $echant_now;
        $resultats = ResultatAnalyse::find($echant->id_echantillon);
        if($resultats != null) {
            $resultat = $resultats->intepretation;
        } else {
            $resultat = "";
        }
        //dd($resultats->intepretation);
        return view('Echantillons.edit', compact('echant', 'resultat'));
    }

    public function update(EchantillonAnalyse $echant_now, Request $request) {
        $resultats = ResultatAnalyse::find($echant_now->id_echantillon);
        if($resultats != null) {
            $resultats -> update([
                "intepretation" => $request->input('analyse_resultat')
            ]);
        } else {
            
            $echant_now -> resultatEchantillon() -> create([
                "intepretation" => $request->input('analyse_resultat')
            ]);
        }

        return redirect(route('echantillon.index'));
    }

    public function complete(EchantillonAnalyse $echant_now) {
        $echant_now -> update([
            "status_echantillon" => "Termine"
        ]);
        $echantillonAnalyse = EchantillonAnalyse::where('id_demande', $echant_now->id_demande)->get();
        $demandeTermine = true;
        foreach($echantillonAnalyse as $echantillon) {
            if($echantillon->status_echantillon == "En cours") {
                $demandeTermine = false;
            }
        }
        if($demandeTermine) {
            $demande = DemandeAnalyse::find($echant_now->id_demande);
            $demande -> update([
                "status_demande" => "Termine"
            ]);
        }
        
        return redirect()->back();
    }
}
