@extends('layouts.app')


@section('content')

<div class="container mb-4 pb-5">
    <p>2 cours dans le panier</p>
    <div class="jumbotron">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">

                    <table class="table table-striped">
                        <tbody>
                            @foreach (\Cart::session(Auth::user()->id)->getContent() as $cours)

                                @php
                                    $tax=\Cart::getTotal()*(18/100);
                                    $taxarrondie=round($tax,0);
                                @endphp
                            <tr>
                                <td><img class="cart-img" src="/storage/cours/{{$cours->model->user_id}}/{{$cours->model->image}}" /> </td>
                                <td><p><b>{{$cours->model->nom}}</b></p><p>Par {{$cours->model->user->name}}</p></td>
                                <td class="text-left">
                                    <small><a class="btn border" href="#">Supprimer</a></small><br>
                                    <small><a class="btn border" href="#">Enregistrer pour plus tard</a></small><br>
                                    <small><a class="btn border" href="#">Ajouter à la liste de souhaits</a></small>
                                </td>
                                <td class="text-right">{{$cours->model->prix}} FCFA</td>
                            </tr>

                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td>Sous-total</td>
                                <td class="text-right">{{\Cart::getSubTotal()}} FCFA</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>TVA</td>
                                <td class="text-right">{{$taxarrondie}} FCFA</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td class="text-right"><strong>{{\Cart::getTotal()+$taxarrondie}} FCFA</strong></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                        <a href="#" class="btn btn-block btn-light">Continuer vos achats</a href="#">
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <a href="#" class="btn btn-lg btn-block btn-success text-uppercase">Payer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="save-for-later jumbotron my-5">
        <h3>Enregistré pour plus tard</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><img class="cart-img" src="https://blog.hyperiondev.com/wp-content/uploads/2019/02/Blog-Types-of-Web-Dev.jpg" /> </td>
                        <td><p><b>Titre du cours</b></p><p>Par Nom du formateur</p></td>
                        <td class="text-left">
                            <small><a class="btn border" href="#">Supprimer</a></small><br>
                            <small><a class="btn border" href="#">Ajouter au panier</a></small>
                        </td>
                        <td class="text-right">19,99 €</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="wish-list jumbotron pt-3">
        <h3 class="my-3">Récemment ajouté à la liste de souhaits</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <td><img class="cart-img" src="https://blog.hyperiondev.com/wp-content/uploads/2019/02/Blog-Types-of-Web-Dev.jpg" /> </td>
                        <td><p><b>Titre du cours</b></p><p>Par Nom du formateur</p></td>
                        <td class="text-left">
                            <small><a class="btn border" href="#">Supprimer</a></small><br>
                            <small><a class="btn border" href="#">Ajouter au panier</a></small>
                        </td>
                        <td class="text-right">29,99 €</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
