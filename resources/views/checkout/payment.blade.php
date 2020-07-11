@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <form class="jumbotron row contact_form" action="{{route('paymentcharger')}}" method="POST" id="payment-form">
                @csrf
                <div class="col-md-12 form-group">
                    <div class="create account">
                        <h3 class="mb-3 ml-3"> Paiement</h3>
                        <div id="card-element">
                          <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                      </div>
                </div>
                <button id="complete-order" type="submit" class="primary-btn my-3">Procéder au paiement</button>
            </form>
            <div class="order-details my-5">
                <h3>Détails de la commande</h3>
                <table class="table table-striped">
                    <tbody>
                        @foreach ($commande as $cours)
                            <tr>
                                <td><img class="cart-img" src="/storage/cours/{{$cours->model->user_id}}/{{$cours->model->image}}" /> </td>
                                <td><p><b>{{$cours->model->nom}}</b></p><p>Par {{$cours->model->user->name}}</p></td>
                                <td class="text-right">{{$cours->price}} fcfa</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                  Résumé
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p>Prix d'origine:</p>
                        <p>{{\Cart::getSubTotal()}} FCFA</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p>Taxe:</p>
                        @php
                            $tax=\Cart::getTotal()*(18/100);
                            $taxarrondie=round($tax,0);
                        @endphp
                        <p>{{$taxarrondie}} FCFA</p>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p><b>Prix total:</b></p>
                        <p><b>{{\Cart::getTotal()+$taxarrondie}} FCFA</b></p>
                    </div>
                    <small class="card-text">Comme exigé par la loi,Yes We Learn Gabon prélève les taxes sur les transactions applicables aux achats réalisés dans certaines juridictions fiscales.
                    En validant votre achat, vous acceptez ces Conditions générales d'utilisation.</small>
                </div>
              </div>
        </div>
    </div>
</div>

@stop
