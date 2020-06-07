@extends('layouts.app')


@section('content')

<div class="container mb-4 pb-5">
    @if (count(\Cart::session(Auth::user()->id)->getContent())>0)

        <p>Vous avez {{count(\Cart::session(Auth::user()->id)->getContent())}} cours dans le panier</p>
    @else
        <p> Votre panier est actuellement vide</p>
    @endif

    <div class="jumbotron">
        @if (count(\Cart::session(Auth::user()->id)->getContent())>0)
            <div class="d-flex justify-content-end mb-3">
                <a href="{{route('paniervider')}}" class="btn btn-block btn-danger w-50">
                    vider votre panier
                </a>
            </div>
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
                                        <small><a class="btn border" href="{{route('paniersupprimeritem',$cours->model->id)}}">Supprimer</a></small><br>
                                        <small><a class="btn border" href="#">Ajouter aux coups de coeur</a></small>
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
                            <a href="{{route('affichercours')}}" class="btn btn-block btn-light">Continuer vos achats</a href="#">
                        </div>
                        <div class="col-sm-12 col-md-6 text-right">
                            <a href="#" class="btn btn-lg btn-block btn-success text-uppercase">Payer</a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="emptycart text-center">
                <i class="fas fa-shopping-cart fa-6x"></i>
                <h4 class="my-5"> Vous n'avez aucun cours pour le moment dans votre panier, Continuez vos achats sur la plateforme AcademiA et trouvez les cours qui vous correspondent</h4>
                <a href="{{route('affichercours')}}" class="primary-btn">
                    Les Cours
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        @endif
    </div>
    <div class="wish-list jumbotron pt-3">

    @if (count(\Cart::session(Auth::user()->id.'_coupDeCoeur')->getContent())>0)



        <h3 class="my-3">Votre liste de coup de coeur</h3>
        <div class="table-responsive">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{route('coupdecoeurvider')}}" class="btn btn-block btn-danger w-50">
                    vider votre liste de coup de coeur
                </a>
            </div>
            <table class="table table-striped">
                @foreach (\Cart::session(Auth::user()->id.'_coupDeCoeur')->getContent() as $coupDeCoeur)
                    <tbody>
                        <tr>
                        <td><img class="cart-img" src="/storage/cours/{{$coupDeCoeur->model->user_id}}/{{$coupDeCoeur->model->image}}" /> </td>
                            <td><p><b>{{$coupDeCoeur->model->nom}}</b></p><p>Par {{$coupDeCoeur->model->user->name}}</p></td>
                            <td class="text-left">
                                <small><a class="btn border" href="{{route('coupdecoeursupprimeritem', $coupDeCoeur->model->id)}}">Supprimer</a></small><br>
                                <small><a class="btn border" href="{{route('coupdecoeurajouteraupanier', $coupDeCoeur->model->id)}}">Ajouter au panier</a></small>
                            </td>
                            <td class="text-right">{{$coupDeCoeur->price}} FCFA</td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    @else
        <div class="emptycart text-center">
            <i class="fas fa-heart fa-3x"></i>
            <h4 class="my-5"> Vous n'avez pas encore eut de coup de couer sur la plateforme AcademiA, Continuez vos achats et regarder les cours qui vous plaisent</h4>
            <a href="{{route('affichercours')}}" class="primary-btn">
                Les Cours
                <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    @endif
    </div>
</div>

@endsection
