<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Test;
use App\Models\Echantillon;

class EchantillonController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $echantillon = Echantillon::all();
        //$echantOne = $echantillon[1]->nom_type;
        //dd($echantillon[0]);
        //$echant = array();
        //$echantTest = array();
        //$echant[$echantOne] = $echantTest;
        //$counter = 1;
        /*
        for($i=0 ; $i<sizeof($echantillon); $i++) {
            if($echantillon[$i]->nom_type == $echantOne) {
                $test_assoc = $echantillon[$i]->test_associe;
                $findTest = Test::find($test_assoc);
                array_push($echantTest, $findTest->nom_test);
                
                //$counter++;
                if($i == sizeof($echantillon)-1) {
                    $echant[$echantillon[$i]->nom_type] = $echantTest;
                }
            } else {
                $echant[$echantillon[$i-1]->nom_type] = $echantTest;
                $echantTest = array();
                $test_assoc = $echantillon[$i]->test_associe;
                $findTest = Test::find($test_assoc);
                array_push($echantTest, $findTest->nom_test);
                $echantOne = $echantillon[$i]->nom_type; 
            }
        }*/
        //dd($echant);
        return view('EchantillonType.index')->with(['allEchant' => $echantillon]);
    }

    public function create() {
        //$test = Test::all();
        return view('EchantillonType.add');
    }

    public function store(Request $request, Echantillon $echant) {
        //dd($request->tests_add);
        //$testLength = $request->tests_add;
        
        $rules = [
            'nom_type' => ['required','max:255', 
            
            ],
            //'acronyme_test' => 'required|max:255',
            'description_echantillon' => 'required'
        ];
        $messages = [
            //'nom_test.required' => 'Les champs ne sont doivent pas etre vide',
            //'acronyme_test.required' => 'Les champs ne sont doivent pas etre vide',
            //'nom_test.max' => 'La taille maximale du champ test est de 255 caracteres',
            //'acronyme_test.max' => 'La taille maximale du champ acronyme est de 255 caracteres',
            //'description.required' => 'Le test doit disposer dun nom',
            "required" => "Le champ :attribute ne doit pas etre vide",
            "max" => "Le champ :attribute doit contenir uniquement 255 caracteres",
            "exists" => "Le champ :attribute existe deja",
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }
        
        $echant->create(['nom_type' => $request->nom_type, 'description_echantillon' => $request->description_echantillon]);
        return redirect()->back()->with('message', 'Echantillon Ajoutee');
    }

    public function edit(Echantillon $echant) {
        
        return view('EchantillonType.edit',  compact('echant'));
        
    }

    public function update(Echantillon $echant, Request $request) {
        $echant -> update(
            $request->all()
        );
        return redirect(route('echantillonType.index'))->with('message', 'Mise a jour reussi');
    }
}
