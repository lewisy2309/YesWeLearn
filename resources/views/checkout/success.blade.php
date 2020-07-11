@extends('layouts.app')

@section('content')

@foreach ($commande as $cours)

<div class="row justify-content-center">
    <div class="card w-25 mx-5">
        <img src="/storage/cours/{{$cours->model->user_id}}/{{$cours->model->image}}">
        <div class="card-body">
            <div class="action d-flex justify-content-between">
                <p>
                    <i class="fas fa-clock"></i>
                    {{$cours->model->updated_at}}
                </p>
                <p>Par {{$cours->model->user->name}}</p>
            </div>
            <p class="card-text">{{$cours->model->nom}}</p>
        </div>
        <div class="action d-flex justify-content-around my-3">
            <a href="#" class="primary-btn w-75">
                <i class="fas fa-graduation-cap"></i>
                Commencer
            </a>
        </div>
    </div>
</div>

@endforeach

@stop
