<?php

namespace App\Http\Controllers;

use App\User;
use App\Cours;
use App\Niveau;
use App\Matiere;
use App\Payment;
use App\Chapitre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class participantController extends Controller
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
        $user=User::all();
        $matiere=Matiere::all();
        $niveau=Niveau::all();
        $cours=Cours::all();
        $payment=Payment::where('email', Auth::user()->email)->get();
        return view('participant.courses',[
            'cours'=>$cours,
            'payments'=>$payment,
            'user'=>$user,
            'matiere'=>$matiere,
            'niveau'=>$niveau
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cours=Cours::find($id);
        $chapitre=Chapitre::where('cours_id',$id)->get();



        return view('participant.course',[
            'cours'=>$cours,
            'chapitre'=>$chapitre,
        ]);
    }

    /**
     * Show different video function of the choice.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function displayChapitre($id,$chapitre)
    {
        $cours=Cours::find($id);
        $chapitre=Chapitre::where('slug',$chapitre)->firstOrFail();
        return view('participant.section', [
            'cours'=>$cours,
            'chapitre'=>$chapitre
        ]);
    }



    public function displayPersonalProfile(){
        $user=Auth::user();
        $niveau=Niveau::all();
        return view('home',[
            'cours'=>$user,
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
