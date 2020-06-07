@extends('layouts.app')

@section('content')

 <section class="about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Cours pour commencer</h2>
                    <p class="f-para">There are several ways people can make money online. From selling products to advertising. In this article I am going to explain the concept of contextual advertising.</p>
                </div>
            </div>
        </div>
        @include('incs.cours.categorie-banner')
        <div class="row">
            @foreach ($cours as $elementcours)
                    <div class="courses container my-5">
                        <div class="course my-5 row">
                            <div class="col-lg-4">
                                <div class="about-pic">
                                    <a href="{{route('affichercoursparticulier', $elementcours->slug)}}">
                                    <img src="storage/cours/{{$elementcours->user_id}}/{{$elementcours->image}}" alt="Course img">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-text pt-0">
                                    <h3> {{$elementcours->nom}} </h3>
                                    <p>Par <b>{{$elementcours->user->name}}</b></p>
                                    <span class="tag">{{$elementcours->matiere->nom}}</span>
                                    <span class="tag">{{$elementcours->niveau->nom}}</span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <p><b>{{$elementcours->prix===0.00? 'Gratuit': $elementcours->prix.' FCFA'}} </b></p>
                                <a href="{{route('coupdecoeursauvegarderitem',$elementcours->id)}}"><i class="fas fa-heart fa-2x"></i></a>
                            </div>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
