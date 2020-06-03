@extends('layouts.professeur-app')

@section('content')

<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-8">
                <h3>Tarification</h3>
                <form action="{{route('prixcourssauvegarder', $cours->id)}}" class="comment-form contact-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- @method('put') --}}
                    <div class="content">
                        <p>Tarif du cours</p>
                        <p>Choisissez un niveau de tarif pour votre cours ci-dessous et cliquez sur « Enregistrer ». Le prix affiché visible par les participants dans d'autres devises est calculé à l'aide d'une grille tarifaire en fonction du tarif auquel celui-ci correspond.</p>
                        <p>Si vous prévoyez de rendre votre cours gratuit, la longueur totale de son contenu vidéo doit être inférieure à 2 heures.</p>
                    </div>
                    <div class="col-lg-12">
                        <select class="form-control" name="prix">
                            <option value="0" {{$cours->prix===0.00? 'selected' :''}}>Gratuit</option>
                            <option value="2000" {{$cours->prix===2000.00? 'selected' :''}}>2000 FCFA</option>
                            <option value="2500" {{$cours->prix===2500.00? 'selected' :''}}>2500 FCFA</option>
                            <option value="3000" {{$cours->prix===3000.00? 'selected' :''}}>3000 FCFA</option>
                            <option value="3500" {{$cours->prix===3500.00? 'selected' :''}}>3500 FCFA</option>
                            <option value="4000" {{$cours->prix===4000.00? 'selected' :''}}>4000 FCFA</option>
                            <option value="4500" {{$cours->prix===4500.00? 'selected' :''}}>4500 FCFA</option>
                            <option value="5000" {{$cours->prix===5000.00? 'selected' :''}}>5000 FCFA</option>
                        </select>
                    </div>
                    <div class="col-lg-12 mt-5">
                        <button type="submit" class="primary-btn">
                            <i class="fas fa-save"></i>
                            Sauvegarder
                        </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
