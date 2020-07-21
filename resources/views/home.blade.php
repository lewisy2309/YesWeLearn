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
                     <img class="border-rounded rounded-circle profile-picture" src="https://uploads-ssl.webflow.com/5bddf05642686caf6d17eb58/5dc2fd00c29f7abeadd7c332_gPZwCbdS.jpg"/>
                    </div>
                    <div class="about-text pt-0 container">
                                <h3>{{Auth::user()->name}}</h3>
                                <p><span>Statut:</span> Utilisateur</p>
                                <p>Niveau <b></b></p>

                                <p><span>Nombres de cours sur la plateforme:</span><p>

                                <div class="col-lg-3">
                                    <a href="#" class="primary-btn">
                                        Continuer
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                    </div>

                </div>
                You are logged in!
            </div>
        </div>
    </div>
</div>
@endsection
