<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Test;

class TestController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $tests = Test::orderBy('created_at','DESC')->get();
        return view('Analyses.index')->with(['allTest' => $tests]);
    }

    public function create() {
        return view('Analyses.add');
    }

    public function store(Test $test, Request $request) {
        //dd($request->all());
        $rules = [
            'nom_test' => ['required','max:255', 
            //Rule::exists('Tests')->where(function($query) use($request) {
            //    $query->where('nom_test', $request->input('nom_test'));
            //    dd($query);
            //})
            ],
            'acronyme_test' => 'required|max:255',
            'description' => 'required'
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
        /*$isTest = $test ->firstOrCreate([
            ['nom_test'=> $request->input('nom_test'), ],
            ['acronyme_test' => $request->input('acronyme_test'),'description' => $request->input('description')]
            $request->all()
            ['nom_test' => $request->nom_test],
        ]);
        if ($isTest != null) {
            return redirect()->back()->with('message', 'Le nom ou l\'acronyme existe deja');
        }*/
        $test -> create($request->all());
        return redirect()->back()->with('message', 'Nouveau test ajoute');
    }

    public function edit(Test $test) {
        return view('Analyses.edit', compact('test'));
    }

    public function update(Test $test, Request $request) {
        $test->update(['nom_test' => $request->nom_test, 'acronyme_test'=> $request->acronyme_test, 'description' => $request->description, 'normes' => $request->normes_test]);
        return redirect(route('test.index'))->with('message', 'Mise a jour reussi');
    }

    public function destroy(Test $test) {
        $test -> delete();
        return redirect(route('test.index'))->with('message', 'Suppression reussi');
    }
}
