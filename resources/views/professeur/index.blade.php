@extends('layouts.app')

@section('content')

<section class="related-post-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Cours</h2>
                    <p class="mt-3">Dès maintenant, créez votre prochain cours en quelques clics !</p>
                    <a href=" {{route('professeurcreationcours')}} " class="primary-btn mt-3">
                        <i class="fas fa-plus"></i>
                        Nouveau cours
                    </a>
                </div>
            </div>
        </div>


            <div class="row">
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="bi-text">
                            <h5><a class="btn font-weight-bold" href="#"> titre du cours </a></h5>
                            <span><i class="fa fa-clock-o"></i> 23-09-2020</span>
                        </div>
                    </div>
                <div class="blog-item set-bg" data-setbg="{{ asset('img/hero.jpg') }}">
                    </div>
                    <div class="btn-actions d-flex justify-content-center">
                        <a href=" # " class="btn  primary-btn btn-lg btn-success">
                            <i class="fas fa-edit"></i>
                            Modifier
                        </a>
                    </div>
                </div>
            </div>





    </div>

</section>

@endsection
