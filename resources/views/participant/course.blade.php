@extends('layouts.app')

@section('content')

@php
    $chap=$cours->chapitre[0];
    $i=0;
@endphp

<section class="latest-blog container-fluid px-5 spad">
    <h2 class="text-center my-3">{{$cours->nom}}</h2>
    <h4 class="text-center my-3">{{$chap->nom}}</h4>
    <div class="row">
        <div class="col-md-8">
            <video width="800" height="550" controls>
            <source src="{{ asset("storage/cours_chapitres/$cours->user_id/$chap->video")}}" type='video/mp4'>
            </video>
        </div>
        <div class="col-md-4">
            <ul class="list-group list-group-flush mt-5 pt-2">

                @foreach ($cours->chapitre as $chapitre)
                @php
                    $i++;
                @endphp
                <li class="list-group-item bg-light">
                    <a href="{{route('moncourschapitre',[
                        'id'=>$cours->id,
                        'chapitre'=>$chapitre->slug
                    ])}}" class="btn">
                        <i class="fas fa-book"></i>
                        Chapitre {{$i}} : {{$chapitre->nom}}
                    </a>
                </li>

                @endforeach

              </ul>
        </div>
    </div>
</section>

@stop
