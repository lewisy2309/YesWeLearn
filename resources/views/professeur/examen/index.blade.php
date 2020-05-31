@extends('layouts.app')

@section('content')

<section class="related-post-section spad">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Epreuves</h2>
                    <p class="mt-3">Envoyer les prédentes épreuves d'examens ici !</p>
                    <a href=" {{route('ajouterenonceexamencreer')}} " class="primary-btn mt-3">
                        <i class="fas fa-plus"></i>
                        Nouvelle épreuve
                    </a>
                </div>
            </div>
        </div>

        <div class="container">
            <ul class="list-group">
            @if (count(Auth::user()->enonce_examen)>0)

                @foreach (Auth::user()->enonce_examen as $enonce)

                    <li class="list-group-item d-flex flex-row justify-content-between">
                        {{$enonce->nom}} {{$enonce->matiere->nom}} {{$enonce->examen->nom}}
                        <div>
                            <a href="{{route('enonceexamenmodifier',$enonce->id)}}" role="button" class="btn btn-secondary">modifier</a>
                            <a href="{{route('supprimerenonceexamen',$enonce->id)}}" role="button" class="btn btn-danger">supprimer</a>
                        </div>
                    </li>
                @endforeach
            @else

                <div class="jumbotron center"> En tant que professeur vous pouvez aider Academia à pouvoir avoir accès à tous les sujets des précédents examens en ajoutant un sujet ici</div>

            @endif



        </ul>
        </div>

@endsection
