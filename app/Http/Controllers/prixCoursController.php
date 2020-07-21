<?php

namespace App\Http\Controllers;

use App\Cours;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class prixCoursController extends Controller
{

    public function __construct(){
        $this->Middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pricing($id)
    {
        $cours=Cours::find($id);
        return view('professeur.pricing',[
            'cours'=>$cours,
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

        $cours=Cours::find($id);
        $cours->prix=$request->input('prix');
        $cours->save();
        return redirect()->route('contenucoursaccueil',$cours->id)->with('success','Le prix du cours a bien été modifié');

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
