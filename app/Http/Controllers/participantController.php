<?php

namespace App\Http\Controllers;

use App\User;
use App\Cours;
use App\Photo;
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
        $photo=Photo::all( );
        $nbCours=Payment::where('email',Auth::user()->email)->get()->count();
        return view('home',[
            'cours'=>$user,
            'niveau'=>$niveau,
            'nbCours'=>$nbCours,
            'photo'=>$photo,
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePersonalProfile(Request $request )
    {
        $niveaux=Niveau::all();
        return view ('participant.updatePersonalInformation',[

            'niveaux'=>$niveaux
        ]);
    }

    public function updatePersonalProfileStore(Request $request )
    {
        $user=User::find(Auth::user()->id);
        $photo=Photo::where('user_id',Auth::user()->id)->firstOrFail();
        $user->name=$request->input('user_nom');
        $user->niveau_id=$request->input('niveau');
        if($request->file('photo_de_profil')){
            if($photo->count()>0 ){

            $image =$request->file('photo_de_profil');
            $imageFullName= $image->getClientOriginalName();
            $imageName=pathInfo($imageFullName, PATHINFO_FILENAME );
            $extension=$image->getClientOriginalExtension();
            $file = time().'_'.$imageName.'.'.$extension;
            $image->storeAs('public/photo_de_profil/'. Auth::user()->id , $file);
            $photo->location=$file;
            $photo->save();

         }
         else {
            $photo=new Photo;
            $image =$request->file('photo_de_profil');
            $imageFullName= $image->getClientOriginalName();
            $imageName=pathInfo($imageFullName, PATHINFO_FILENAME );
            $extension=$image->getClientOriginalExtension();
            $file = time().'_'.$imageName.'.'.$extension;
            $image->storeAs('public/photo_de_profil/'. Auth::user()->id , $file);
            $photo->location=$file;
            $photo->user_id=Auth::user()->id;
            $photo->save();
         }
        }

        $user->save();
        return redirect()->route('home')->with('success', 'informations modifiées');

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
