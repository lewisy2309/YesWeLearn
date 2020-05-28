@extends('layouts.professeur-app')

@section('content')

 <section class="schedule-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Programme</h2>
                    <p>{{$cours->nom}}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="schedule-tab">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            @if (count($cours->chapitre)>0)
                                <div class="text-center mb-5">
                                    <a class="primary-btn" href="{{route('contenucourscreerchapitre', $cours->id)}}">
                                        <i class="fas fa-plus mr-2"></i>
                                        Ajouter un chapitre à votre cours
                                    </a>
                                </div>

                                @foreach ($cours->chapitre as $chapitre)
                                    <div class="st-content">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-4 px3 py-3">
                                                    <video width="300" height="200" controls>
                                                        <source src="{{asset("storage/cours_chapitres/$cours->user_id/$chapitre->video")}}" type="video/mp4">
                                                    </video>
                                                </div>
                                                <div class="col-lg-4 text-left">
                                                    <div class="sc-text">
                                                        <h4>{{$chapitre->nom}}</h4>
                                                    </div>
                                                    <p>{{$chapitre->duree_seconde}}</p>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="sc-text d-flex justify-content-around">
                                                        <a class="btn btn-danger" href="{{route('contenucourssupprimerchapitre',[
                                                        'id'=>$cours->id,
                                                        'chapitre'=>$chapitre->id])}}">
                                                            <i class="fas fa-trash"></i>
                                                            Supprimer
                                                        </a>
                                                        <a class="btn btn-warning" href="{{route('contenucoursmodifierchapitre',[
                                                            'id'=>$cours->id,
                                                            'chapitre'=>$chapitre->id
                                                        ])}}" style="color=white">
                                                            <i class="fas fa-edit"></i>
                                                            Modifier
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                            <div class="text-center">
                                <a href="{{route('contenucourscreerchapitre', $cours->id)}}" class="primary-btn" >
                                    <i class='fas fa-plus'></i>
                                    ajouter mon premier chapitre pour ce cours
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>

@stop
