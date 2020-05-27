@extends('layouts.professeur-app')

@section('content')

<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
            <form action="{{route('professeurmajcours',$cours->id)}}" class="comment-form contact-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="nom">Titre du cours</label>
                            <input type="text" placeholder="Name" name="nom" value="{{$cours->nom}}">
                        </div>
                        <div class="col-lg-12">
                            <label for="description">Description du cours</label>
                            <textarea type="textarea" placeholder="Phone" name="description">{{$cours->description}}</textarea>
                        </div>
                        <div class="col-lg-12">
                            <label for="objectif">Objectifs du cours</label>
                            <textarea type="textarea" placeholder="Phone" name="objectif">{{$cours->objectif}}</textarea>
                        </div>
                        <div class="col-lg-12">
                            <label for="matiere">Matiere:</label>
                                <select class="form-control" name="matiere">
                                    @foreach ($matieres as $matiere)
                                        <option value="{{$matiere->id}}"  {{$cours->matiere_id == $matiere->id ? 'selected' : '' }}>{{$matiere->nom}}</option>
                                    @endforeach
                                </select>

                        </div>
                        <div class="col-lg-12">
                            <label for="niveau">Niveau:</label>
                                <select class="form-control" name="niveau">
                                    @foreach ($niveaux as $niveau)
                                        <option value="{{$niveau->id}}" {{$cours->niveau_id == $niveau->id ? 'selected' : '' }}>{{$niveau->nom}}</option>
                                    @endforeach
                                </select>

                        </div>
                        <div class="col-lg-12 mt-5">
                            <label for="image">Image du cours</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="/storage/cours/{{Auth::user()->id}}/{{$cours->image}}"/>
                                </div>
                                <div class="col-lg-6">
                                    <input type="file" name="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-5 d-flex justify-content-center">
                            <button type="submit" class="primary-btn">
                                <i class="fas fa-save"></i>
                                Sauvegarder
                            </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
