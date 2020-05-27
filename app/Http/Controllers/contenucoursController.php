<?php

namespace App\Http\Controllers;

use getID3;
use App\Cours;
use App\Chapitre;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class contenucoursController extends Controller
{
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


       $video=$request->file('video_chapitre');
       $filefullname=$video->getClientOriginalName();
       $fileName=pathinfo($filefullname,PATHINFO_FILENAME);
       $extension=$video->getClientOriginalExtension();
       $file=time().'_'.$fileName.'.'.$extension;
       $video->storeAs('public/cours_chapitres/'.Auth::user()->id, $file);

       $chapitre->video=$file;
       $chapitre->cours_id=$id;

       $getID3= new getID3;
       $pathvideo='storage/cours_chapitres/'.Auth::user()->id.'/'.$file;
       $fileanalyse=$getID3->analyze($pathvideo);
       $playtime=$fileanalyse['playtime_string'];
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
