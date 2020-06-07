<?php

namespace App\Http\Controllers;

use App\Cours;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class coupDeCoeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $cours= Cours::find($id);
        $ajouterCoupDeCoeur=\Cart::session(Auth::user()->id.'_coupDeCoeur')->add(array(
            'id' => $cours->id,
            'name' => $cours->nom,
            'price' => $cours->prix,
            'quantity' => 1,
            'associatedModel' => $cours
        ));

        return redirect()->route('panierafficher');
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

        \Cart::session(Auth::user()->id.'_coupDeCoeur')->remove($id);
        return redirect()->route('panierafficher')->with('success','élément supprimé de la liste de souhait');
    }

    /**
     * clear the wish list.
     *
     *
     */
    public function clear()
    {


        \Cart::session(Auth::user()->id.'_coupDeCoeur')->clear();
        return redirect()->route('panierafficher')->with('success', "Vous venez de vider votre liste de coup de coeur mais ne vous inquiétez pas, chacun trouve son compte sur AcademiA");
    }

    /**
     * delete an item from the wish list and add it to cart.
     *
     *
     */
    public function addToCart($id)
    {


        \Cart::session(Auth::user()->id.'_coupDeCoeur')->remove($id);
        $cours= Cours::find($id);
        $ajouter= \Cart::session(Auth::user()->id)->add(array(
          'id'=>$cours->id,
          'name'=>$cours->nom,
          'price'=>$cours->prix,
          'quantity'=>1,
          'associatedModel'=>$cours
        ));
        return redirect()->route('panierafficher')->with('success','Cours supprimé de la liste de souhaits et ajouté dans le panier');
    }
}

