@extends('layouts.app')

@section('content')

<section class="blog-hero-section set-bg pb-5" data-setbg="/storage/cours/{{$cours->user_id}}/{{$cours->image}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="bh-text">
                    <h2>{{$cours->nom}}</h2>
                    <ul>
                        <li><span>Par <strong>{{$cours->user->name}}</strong></span></li>
                        <li>{{$cours->created_at}}</li>
                        <li>Mis à jour le {{$cours->updated_at}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="blog-details-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="bd-text">
                    <div class="bd-title text-center">
                        <h3>{{$cours->nom}}</h3>
                        <div class="bd-tag-share">
                            <div class="tag d-flex justify-content-center">
                                <a href="#">{{$cours->niveau->nom}}</a>
                            </div>
                        </div>
                        <div class="bd-tag-share">
                            <div class="tag d-flex justify-content-center">
                                <a href="#">{{$cours->matiere->nom}}</a>
                            </div>
                        </div>

                    </div>
                    <div class="bd-more-text">
                        <p>{{$cours->description}}</p>
                    </div>
                    <div class="bd-more-pic">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="/storage/cours/{{$cours->user_id}}/{{$cours->image}}" alt="image du cours">
                            </div>
                            <div class="col-md-6">
                                    <div class="price-item top-rated">
                                        <div class="tr-tag">
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="pi-price mt-5">
                                            <h2>{{$cours->prix}} fcfa</h2>
                                        </div>
                                        <a href="{{route('paniersauvegarderitem',$cours->id)}}" class="price-btn">Suivre ce cours <i class="fas fa-arrow-right"></i></a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="related-post-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Quelques cours pouvant vous intéresser qui sont présents sur la Plateforme <span>AcademiA</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($recommendations as $recommendation)

                <div class="col-md-4">
                <div class="blog-item set-bg" data-setbg="/storage/cours/{{$recommendation->user_id}}/{{$recommendation->image}}">

                        <div class="bi-tag bg-gradient">{{$recommendation->matiere->nom}}</div>
                        <div class="bi-tag2 bg-gradient">{{$recommendation->niveau->nom}}</div>
                        <div class="bi-text">
                        <h5><a href="{{route('affichercoursparticulier',$recommendation->slug)}}">{{$recommendation->nom}}</a></h5>
                            <span><i class="fa fa-clock-o"></i> {{$recommendation->created_at}}</span>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</section>
@endsection
