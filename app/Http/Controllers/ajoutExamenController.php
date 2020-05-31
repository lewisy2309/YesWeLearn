<?php

namespace App\Http\Controllers;

use App\Examen;
use App\Niveau;
use App\Matiere;
use App\Enonce_examen;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ajoutExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matiere=Matiere::all();
        $examen=examen::all();
        $enonce_examen=Enonce_examen::all();
        return view('professeur.examen.index',[
            'examen'=>$examen,
            'matiere'=>$matiere,
            'enonce_examen'=>$enonce_examen
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $examens= Examen::all();
        $matieres=Matiere::all();
        $enonce_examen=Enonce_examen::all();
        return view('professeur.examen.create',[
            'examens'=>$examens,
            'matieres'=>$matieres,
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
        $slugify=new Slugify();
        $enonce_examen= new Enonce_examen();
        $enonce_examen->nom=$request->input('nom');
        $enonce_examen->slug=$slugify->slugify($enonce_examen->nom);
        $enonce_examen->matiere_id=$request->input('matiere');
        $enonce_examen->examen_id=$request->input('examen');
        $enonce_examen->user_id=Auth::user()->id;
        $document =$request->file('document');
        $documentFullName= $document->getClientOriginalName();
        $imageName=pathInfo($documentFullName, PATHINFO_FILENAME );
        $extension=$document->getClientOriginalExtension();
        $file = time().'_'.$imageName.'.'.$extension;
        $document->storeAs('public/enonce_examen/'. Auth::user()->id , $file);
        $enonce_examen->document=$file;
        $enonce_examen->save();
        return redirect()->route('ajouterenonceexamen')->with('success', "l'énoncé à l'examen a bien été rajouté");
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
        $enonce=Enonce_examen::find($id);

        return view('professeur.examen.edit',[
            'enonce'=>$enonce
        ]);
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
        // $slugify=new Slugify();
        // $cours=Cours::find($id);
        // $chapitre=Chapitre::find($chapitre_id);
        // if($request->input('chapitre_nom')){
        //     // mise à jour du nom du chapitre
        //     $chapitre->nom = $request->input('chapitre_nom');
        //     $chapitre->slug = $slugify->slugify('$chapitre->nom');
        // }

        // if($request->file('chapitre_video')){
        //     // mise à jour de la vidéo du chapitre
        //     $video=$this->videoManager->videoStorage($request->file('chapitre_video'));
        //     $chapitre->video=$video;

        //     $chapitre->duree_seconde=$this->videoManager->getVideoDuration($video);

        // }

        // $chapitre->save();
        // return redirect()->route('contenucoursaccueil', $cours->id)->with('success','la section a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enonce_examen=Enonce_examen::find($id);
        $fichierasupprimer='public/enonce_examen/'. Auth::user()->id.'/'.$enonce_examen->document;
        if(Storage::exists($fichierasupprimer)){
            Storage::delete($fichierasupprimer);
        }
        $enonce_examen->delete();
        return redirect()->route('ajouterenonceexamen')->with('success', 'Enonce supprimé');
    }
}
