@extends('layouts.app')

@section('content')

<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <form action=" {{route('professeurenregistrementcours')}} " class="comment-form contact-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="title">Titre du cours</label>
                            <input type="text" placeholder="Le titre de votre cours" name="nom">
                        </div>

                        <div class="col-lg-12">
                            <label for="description">Description du cours</label>
                            <textarea type="textarea" placeholder="Qu'allez vous enseigner durant ce cours ?" name="description"></textarea>
                        </div>

                        <div class="col-lg-12">
                            <label for="objectifs">Objectifs du cours</label>
                            <textarea type="textarea" placeholder="Avec quelles compétences les apprenants repartiront à la fin de votre cours?" name="objectifs"></textarea>
                        </div>

                        <div class="col-lg-12">
                            <label for="matieres">Matiere:</label>
                            <select class="form-control" name="matieres">

                                @foreach ($matieres as $matiere)
                                    <option value="{{$matiere->id}}">{{$matiere->nom}}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="col-lg-12">
                            <label for="niveau">Niveau:</label>
                            <select class="form-control" name="niveau">

                                @foreach ($niveaux as $niveau)
                                    <option value="{{$niveau->id}}">{{$niveau->nom}}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="col-lg-12 mt-3">
                            <label for="image">Image du cours</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="file" name="image"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
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
