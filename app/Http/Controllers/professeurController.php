<?php

namespace App\Http\Controllers;

use App\Cours;
use App\Niveau;
use App\Matiere;
use Cocur\Slugify\Slugify;
use Illuminate\Http\Request;

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
    {
        return view('professeur.index');
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
        $course = new Course();
        $course->title=$request->input('title');
        $course->slug=$slugify->slugify($course->title);
        $course->subtitle=$request->input('subtitle');
        $course->description=$request->input('description');
        $course->category_id=$request->input('category');
        $course->user_id=Auth::user()->id;

        $image =$request->file('image');
        $imageFullName= $image->getClientOriginalName();
        $imageName=pathInfo($imageFullName, PATHINFO_FILENAME );
        $extension=$image->getClientOriginalExtension();
        $file = time().'_'.$imageName.'_'.$extension;
        $image->storeAs('public/courses/'. Auth::user()->id , $file);
        $course->image=$file;
        $course->save();
        return redirect()->route('instructor.index');
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
