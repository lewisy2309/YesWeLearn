<?php

namespace App\Http\Controllers;

use App\Cours;
use App\Photo;
use App\Niveau;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cours=Cours::all();
        $niveau=Niveau::all();
        $nbCours=Payment::where('email',Auth::user()->email)->get()->count();
        $photo=Photo::where('user_id',Auth::user()->id)->firstOrfail();
        return view('home', [
            'niveau'=>$niveau,
            'photo'=>$photo,
            'nbCours'=>$nbCours,
            'cours'=>$cours
        ]);
    }
}
