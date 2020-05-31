@extends('layouts.app')

@section('content')

<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-10 pl-5 ml-5">
                <h3 class="text-center mb-5">Enoncé</h3>
                <form id="form" action="{{route('enonceexamenmaj',[
                    'id'=>$enonce->id,
                    ])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div id="form-element" class="form-group">
                        <div class="jumbotron py-3">
                            <h4 class="my-3">Eléments de l'Enoncé à l'examen :</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="enonce_matiere">Matiere:</label>
                                    <select class="form-control" name="enonce_matiere">

                                        @foreach ($matieres as $matiere)
                                            <option value="{{$matiere->id}}" {{$enonce->matiere_id == $matiere->id ? 'selected' : '' }}>{{$matiere->nom}}</option>
                                        @endforeach


                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <label for="enonce_examen">Type d'examen :</label>
                                    <select class="form-control" name="enonce_examen">

                                        @foreach ($examens as $examen)
                                            <option value="{{$examen->id}}" {{$enonce->examen_id == $examen->id ? 'selected' : '' }}>{{$examen->nom}}</option>
                                        @endforeach


                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="enonce_nom">Nom de l'énomncé:</label>
                                        <input class="form-control" type="text" id="enonce_nom" name="enonce_nom" value="{{$enonce->nom}}"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="enonce_document">nom du fichier :</label>
                                        <input class="form-control" type="file" id="enonce_fichier" name="enonce_document"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-center mr-3">fichier actuel :{{$enonce->document}}</p>
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
