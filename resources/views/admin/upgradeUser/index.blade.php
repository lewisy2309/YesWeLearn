@extends('layouts.app')

@section('content')

<section class="related-post-section spad">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Tous les utilisateurs</h2>
                    <p class="mt-3">retrouvez tous les utilisateurs de Yes We Learn ici!</p>

                </div>
            </div>
        </div>

        <div class="container">
            <ul class="list-group">
            @if ($users->count()>0)

                @foreach ($users as $user)

                    <li class="list-group-item d-flex flex-row justify-content-between">
                        <img class="avatar-profile border-rounded rounded-circle " src="{{$user->photo ? '/storage/photo_de_profil/'.$user->id.'/'.$user->photo->location : asset('img/avatar.png') }}"/>
                        <b>{{$user->name}}</b> {{$user->niveau->nom}}
                         <span>{{$user->email}}</span>
                        <div>
                            <a href="{{route('upgradespecificutilisateur',$user->id)}}" role="button" class="btn btn-success">Faire passer administrateur</a>
                            <a href="{{route('supprimerutilisateur',$user->id)}}" role="button" class="btn btn-danger">Supprimer l'utilisateur et son contenu </a>
                        </div>
                    </li>
                @endforeach
            @else

                <div class="jumbotron center">Aucun utilisateur présent sur la plateforme pour le moment</div>

            @endif



        </ul>
        </div>

@endsection
