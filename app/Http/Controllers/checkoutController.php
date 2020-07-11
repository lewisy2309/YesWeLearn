<?php

namespace App\Http\Controllers;

use App\User;
use Stripe\Stripe;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalCommande=\Cart::getTotal();
        $tax=\Cart::getTotal()*(18/100);
        $taxArrondie=round($tax,0);
        $totalTaxe=$totalCommande+$taxArrondie;
        $commande=\Cart::session(Auth::user()->id)->getContent();

        return view('checkout.payment',[
            'taxArrondie'=>$taxArrondie,
            'totalTaxe'=>$totalTaxe,
            'totalCommande'=>$totalCommande,
            'commande'=>$commande
        ]);
    }


    public function charge(request $request){

        \Stripe\Stripe::setApiKey(env('STRIPE_PRIVATE_KEY'));

        $cart = \Cart::session(Auth::user()->id);
        $tax=\Cart::getTotal()*(18/100);
        $taxarrondie=round($tax,0);

        try{
            $charge = \Stripe\Charge::create([
                'amount'=> round(((\Cart::session(Auth::user()->id)->getTotal()+$taxarrondie)/655)*100),
                'currency'=>'EUR',
                'description'=> 'Paiement sur la plateforme Yes We Learn Gabon',
                'source'=>$request->input('stripeToken'),
                'receipt_email'=>Auth::user()->email
            ]);
            return redirect()->route('paymentsuccess')->with('success', 'Paiement accepté');

        }catch(\Stripe\Exception\CardErrorException $error){
            throw $error;
        }
    }


    public function success(){

        $user=User::all();
        // redirection de en cas de succès
        if(!session()->has('success')){
            return redirect()->route('affichercours');
        }

        // stockage des éléments du panier dans une variable
        $commande=\Cart::session(Auth::user()->id)->getContent();

        // suppression des éléments du panier

        \Cart::session(Auth::user()->id)->clear();


        return view('checkout.success',[
            'commande'=>$commande,
            'user'=>$user
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
