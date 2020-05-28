@extends('layouts.professeur-app')

@section('content')

<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-10 pl-5 ml-5">
                <h3 class="text-center mb-5">Programme</h3>
                <form id="form" action="{{route('contenucoursmodifierchapitremaj',[
                    'id'=>$cours->id,
                    'chapitre'=>$chapitre->id,
                    ])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div id="form-element" class="form-group">
                        <div class="jumbotron py-3">
                            <h4 class="my-3">Eléments du chapitre :</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input class="form-control" type="text" id="chapitre_nom" name="chapitre_nom" value="{{$chapitre->nom}}"/>
                                    </div>
                                    <div class="form-group">
                                    <input class="form-control" type="file" id="chapitre_video" name="chapitre_video"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <video width="300" height="200" controls>
                                        <source src="{{asset("storage/cours_chapitres/$cours->user_id/$chapitre->video")}}" type="video/mp4">
                                    </video>
                                    <p class="text-center mr-3">Vidéo actuelle</p>
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
