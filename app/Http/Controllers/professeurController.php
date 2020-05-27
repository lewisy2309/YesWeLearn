<?php

namespace App\Http\Controllers;

use App\Cours;
use App\Niveau;
use App\Matiere;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class professeurController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $matieres=Matiere::all();
        $niveaux=Niveau::all();
        $cours=Cours::all();
        return view('professeur.index', [
            'matieres'=>$matieres,
            'niveaux'=>$niveaux
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $matieres=Matiere::all();
        $niveaux=Niveau::all();
        return view('professeur.create', [
            'matieres'=>$matieres,
            'niveaux'=>$niveaux
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slugify= new Slugify();
        $cours = new Cours();
        $cours->nom=$request->input('nom');
        $cours->slug=$slugify->slugify($cours->title);
        $cours->description=$request->input('description');
        $cours->objectif=$request->input('objectif');
        $cours->matiere_id=$request->input('matieres');
        $cours->niveau_id=$request->input('niveau');
        $cours->user_id=Auth::user()->id;
        $image =$request->file('image');
        $imageFullName= $image->getClientOriginalName();
        $imageName=pathInfo($imageFullName, PATHINFO_FILENAME );
        $extension=$image->getClientOriginalExtension();
        $file = time().'_'.$imageName.'_'.$extension;
        $image->storeAs('public/cours/'. Auth::user()->id , $file);
        $cours->image=$file;
        $niveau=Niveau::find($request->input('niveau'));
        $matiere=Matiere::find($request->input('matieres'));
        $niveau->matiere()->sync($matiere);
        $cours->save();
        return redirect()->route('vueprofilprofesseur')->with('success', 'Le cours a bien été ajouté');;



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matieres=Matiere::all();
        $niveaux=Niveau::all();
        $cours=Cours::find($id);
        return view('professeur.edit',[
            'cours'=>$cours,
            'matieres'=>$matieres,
            'niveaux'=>$niveaux,
        ]
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cours=Cours::find($id);
        $slugify= new slugify();
        $cours->nom=$request->input('nom');
        $cours->slug=$slugify->slugify('nom');
        $cours->description=$request->input('description');
        $cours->objectif=$request->input('objectif');
        $cours->matiere_id=$request->input('matiere');
        $cours->niveau_id=$request->input('niveau');

        if($request->file('image')){
            $image =$request->file('image');
            $imageFullName= $image->getClientOriginalName();
            $imageName=pathInfo($imageFullName, PATHINFO_FILENAME );
            $extension=$image->getClientOriginalExtension();
            $file = time().'_'.$imageName.'_'.$extension;
            $image->storeAs('public/cours/'. Auth::user()->id , $file);
            $cours->image=$file;
        }

        $cours->save();
        return redirect()->route('vueprofilprofesseur')->with('success', 'Les modification pour votre cours ont bien été apportées');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cours=Cours::find($id);
        $cours->delete();
        return redirect()->route('vueprofilprofesseur')->with('success', 'Le cours a bien été supprimé');
    }
}
