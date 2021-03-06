<?php

namespace App\Http\Controllers;

use App\User;
use App\Cours;
use App\Niveau;
use App\Matiere;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class coursController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource. (all the courses published)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matiere=Matiere::all();
        $niveau=Niveau::all();
        $user=User::all();
        $cours=Cours::where('public',true)->get();
        return view('cours.index',[
            'cours'=>$cours
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource(One particular course).
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $cours=Cours::where('slug',$slug)->firstOrFail();
        $matiere=Matiere::all();
        $niveau=Niveau::all();
        $user=User::all();
        $payment=Payment::all();
        // gestion des recommendations

        if($payment->where('email',Auth::user()->email)->where('cours_id',$cours->id)->count()!=0 ){
                die('cours vous appartenant ou cours déja acheté');
        }

        $recommendations=Cours::where('public',true)->where('niveau_id',$cours->niveau_id)->where('id','!=',$cours->id)->inRandomOrder()->limit(3)->get();
        return view('cours.show',[
            'cours'=> $cours,
            'matiere'=> $matiere,
            'niveau'=> $niveau,
            'user'=> $user,
            'recommendations'=>$recommendations
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter($id)
    {
        $matiere=Matiere::find($id);
        $niveau=Niveau::all();
        $cours=Cours::where('matiere_id',$matiere->id)->where('public',true)->get();
        return view('cours.index',[
            'matieres'=>$matiere,
            'cours'=>$cours,
            'niveau'=>$niveau
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
