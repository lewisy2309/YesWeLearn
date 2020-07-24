<?php

namespace App\Http\Controllers;

use App\User;
use App\Photo;
use App\Niveau;
use App\DemandeProfesseur;
use Illuminate\Http\Request;

class administrateurController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function displayInstructorDemands()
    {
        $demandes=DemandeProfesseur::all();
        $user=User::all();
        $photo=Photo::all();
        $niveau=Niveau::all();
        return view('admin.demands.index',[
            'demandes'=>$demandes,
            'user'=>$user,
            'photo'=>$photo,
            'niveau'=>$niveau,
        ]
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function InstructorDemandAccept($id)
    {

        $demande=DemandeProfesseur::find($id);
        $user=User::find($demande->user_id);
        $user->statut_id=2;
        $user->save();
        $demande->delete();

        return redirect()->back()->with('success','Cet utilisateur est désormais un formateur de la plateforme Yes We Learn');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function InstructorDemandReject($id)
    {
        $demande=DemandeProfesseur::find($id);
        $demande->delete();

        return redirect()->back()->with('success','Cet utilisateur est désormais un formateur de la plateforme Yes We Learn');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function displayUsers()
    {
       $users=User::where('statut_id',1)->get();
       $photo=Photo::all();
        $niveau=Niveau::all();
       return view('admin.upgradeUser.index',[
           'users'=>$users,
           'photo'=>$photo,
            'niveau'=>$niveau
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function UpgradeUserAdmin($id)
    {
        $user=User::find($id);
        $user->statut_id=3;
        $user->save();

        return redirect()->back()->with('success','Cet utilisateur bénéficie désormais des droits administrateur sur la plateforme Yes We Learn');


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
    public function deleteUser($id)
    {
        $user=User::find($id);
        $user->delete();

        return redirect()->back()->with('success','utilisateur supprimé de la plateforme');

    }
}
