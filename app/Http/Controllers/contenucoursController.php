<?php

namespace App\Http\Controllers;

use getID3;
use App\Cours;
use App\Chapitre;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use App\http\managers\VideoManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class contenucoursController extends Controller
{

    public function __construct(videoManager $videoManager){
        $this->videoManager=$videoManager;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cours=Cours::find($id);
        $chapitre=Chapitre::all();
        return view('professeur.contenucours.index',[
            'cours'=>$cours
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cours=Cours::find($id);
        return view('professeur.contenucours.create',[
            'cours'=>$cours
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

       $slugify= new Slugify();
       $chapitre= new Chapitre();
       $cours=Cours::find($id);

       $chapitre->nom=$request->input('chapitre_nom');
       $chapitre->slug=$slugify->slugify($chapitre->nom);

// stockage de la video
       $video=$this->videoManager->videoStorage($request->file('video_chapitre'));


       $chapitre->video=$video;
       $chapitre->cours_id=$id;
// recupération du temps total de la vidéo
        $playtime=$this->videoManager->getVideoDuration($video);
        $chapitre->duree_seconde=$playtime;


        $chapitre->save();
        return redirect()->route('contenucoursaccueil', $cours->id);


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
    public function edit($id , $chapitre_id)
    {
        $cours=Cours::find($id);
        $chapitre=Chapitre::find($chapitre_id);
        return view('professeur.contenucours.edit',[
            'cours'=>$cours,
            'chapitre'=>$chapitre
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$chapitre_id)
    {
        $slugify=new Slugify();
        $cours=Cours::find($id);
        $chapitre=Chapitre::find($chapitre_id);
        if($request->input('chapitre_nom')){
            // mise à jour du nom du chapitre
            $chapitre->nom = $request->input('chapitre_nom');
            $chapitre->slug = $slugify->slugify('$chapitre->nom');
        }

        if($request->file('chapitre_video')){
            // mise à jour de la vidéo du chapitre
            $video=$this->videoManager->videoStorage($request->file('chapitre_video'));
            $chapitre->video=$video;

            $chapitre->duree_seconde=$this->videoManager->getVideoDuration($video);

        }

        $chapitre->save();
        return redirect()->route('contenucoursaccueil', $cours->id)->with('success','la section a bien été modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$chapitre_id)
    {
        $cours=Cours::find($id);
        $chapitre=Chapitre::find($chapitre_id);
        $fichierasupprimer='public/cours_chapitres/'.Auth::user()->id.'/'.$chapitre->video;
        if(Storage::exists($fichierasupprimer)){
            Storage::delete($fichierasupprimer);
        }

        $chapitre->delete();
        return redirect()->route('contenucoursaccueil', $cours->id);
    }
}
