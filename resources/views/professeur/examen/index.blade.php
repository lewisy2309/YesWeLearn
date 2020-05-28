@extends('layouts.app')

@section('content')

<section class="related-post-section spad">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Epreuves</h2>
                    <p class="mt-3">Envoyer les prédentes épreuves d'examens ici !</p>
                    <a href="# " class="primary-btn mt-3">
                        <i class="fas fa-plus"></i>
                        Nouvelle épreuve
                    </a>
                </div>
            </div>
        </div>

        <div class="container">
            <ul class="list-group">

            <li class="list-group-item d-flex flex-row justify-content-between">
                Cras justo odio
                <div>
                    <a href="#" role="button" class="btn btn-secondary">modifier</a>
                    <a href="#" role="button" class="btn btn-danger">supprimer</a>
                </div>
            </li>

            <li class="list-group-item d-flex flex-row justify-content-between">
                Dapibus ac facilisis in
                <div>
                    <a href="#" role="button" class="btn btn-secondary">modifier</a>
                    <a href="#" role="button" class="btn btn-danger">supprimer</a>
                </div>
            </li>

            <li class="list-group-item d-flex flex-row justify-content-between">
                Morbi leo risus
                <div>
                    <a href="#" role="button" class="btn btn-secondary">modifier</a>
                    <a href="#" role="button" class="btn btn-danger">supprimer</a>
                </div>
            </li>

            <li class="list-group-item d-flex flex-row justify-content-between">
                Porta ac consectetur ac
                <div>
                    <a href="#" role="button" class="btn btn-secondary">modifier</a>
                    <a href="#" role="button" class="btn btn-danger">supprimer</a>
                </div>
            </li>
            <li class="list-group-item d-flex flex-row justify-content-between">
                Vestibulum at eros
                <div>
                    <a href="#" role="button" class="btn btn-secondary">modifier</a>
                    <a href="#" role="button" class="btn btn-danger">supprimer</a>
                </div>
            </li>


        </ul>
        </div>

@endsection
