@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body d-flex flex-row">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                     <img class="border-rounded rounded-circle profile-picture" src="{{Auth::user()->photo ? '/storage/photo_de_profil/'.Auth::user()->id.'/'.Auth::user()->photo->location : asset('img/avatar.png') }}"/>
                    </div>
                    <div class="about-text pt-0 container">
                                <h3>{{Auth::user()->name}}</h3>
                                <p><span>Statut:</span> Utilisateur</p>
                                <p>Niveau <b>{{Auth::user()->niveau->nom}}</b></p>

                                <p><span>Nombres de cours sur la plateforme:</span><p>

                                <div class="col-lg-3">
                                    <a href="{{route('monprofilmodifier')}}" class="primary-btn">
                                        Modifier ses informations personnelles
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </div>
                    </div>

                </div>
                Vous êtes connecté!
            </div>
        </div>
    </div>
</div>
@endsection
