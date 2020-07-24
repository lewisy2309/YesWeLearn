@extends('layouts.app')

@section('content')

<section class="related-post-section spad">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Demandes pour devenir formateur</h2>
                    <p class="mt-3">toutes les demandes en attentes ici !</p>

                </div>
            </div>
        </div>

        <div class="container">
            <ul class="list-group">
            @if ($demandes->count()>0)

                @foreach ($demandes as $demande)

                    <li class="list-group-item d-flex flex-row justify-content-between">
                        <img class="avatar-profile border-rounded rounded-circle " src="{{$demande->user->photo ? '/storage/photo_de_profil/'.$demande->user->id.'/'.$demande->user->photo->location : asset('img/avatar.png') }}"/>
                        <b>{{$demande->user->name}}</b> {{$demande->user->niveau->nom}}
                        <div>
                            <a href="{{route('demandeformateuraccepter',$demande->id)}}" role="button" class="btn btn-success">Accepter</a>
                            <a href="{{route('demandeformateurrejeter',$demande->id)}}" role="button" class="btn btn-danger">Refuser</a>
                        </div>
                    </li>
                @endforeach
            @else

                <div class="jumbotron center">Aucune demande de formateur en attente</div>

            @endif



        </ul>
        </div>

@endsection
