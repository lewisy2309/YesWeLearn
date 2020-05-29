@extends('layouts.app')

@section('content')
    <section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <form action="{{route('ajouterenonceexamencreersauvegarder')}}" class="comment-form contact-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-lg-12">
                            <label for="matiere">Matiere:</label>
                            <select class="form-control" name="matiere">

                                @foreach ($matieres as $matiere)
                                    <option value="{{$matiere->id}}">{{$matiere->nom}}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="col-lg-12">
                            <label for="examen">Type d'examen :</label>
                            <select class="form-control" name="examen">

                                @foreach ($examens as $examen)
                                    <option value="{{$examen->id}}">{{$examen->nom}}</option>
                                @endforeach


                            </select>
                        </div>

                        <div class="col-lg-12">
                            <label for="nom">Année de l'examen</label>
                            <input type="text" placeholder="Ex: BAC C 2020 ou BEPC 2009" name="nom" style="text-transform: uppercase" >
                        </div>

                        <div class="col-lg-12 mt-3">
                            <label for="document">Enoncé de l'examen</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="file" name="document"/>
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
