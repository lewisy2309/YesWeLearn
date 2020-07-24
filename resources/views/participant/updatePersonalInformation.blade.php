@extends('layouts.app')

@section('content')

<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-10 pl-5 ml-5">
                <h3 class="text-center mb-5">Informations personnelles</h3>
                <form id="form" action="{{route('monprofilmodifiersauvegarder')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div id="form-element" class="form-group">
                        <div class="jumbotron py-3">
                            <h4 class="my-3">Mes informations :</h4>
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="user_nom">Nom:</label>
                                        <input class="form-control ml-3" type="text" id="user_nom" name="user_nom" value="{{Auth::user()->name}}"/>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="niveau">Niveau:</label>
                                            <select class="form-control" name="niveau">
                                                @foreach ($niveaux as $niveau)
                                                    <option value="{{$niveau->id}}" {{Auth::user()->niveau_id == $niveau->id ? 'selected' : '' }}>{{$niveau->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label for="photo_de_profil">Photo de profil:</label>
                                        <input class="form-control" type="file" id="photo_de_profil" name="photo_de_profil"/>
                                    </div>

                                </div>

                            </div>
                            <div class="text-center my-3 pt-3">
                                <button type="submit" class="btn btn-info">
                                    <i class="fas fa-save"></i>
                                    Enregistrer les modifications
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@stop
