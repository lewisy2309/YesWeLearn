@extends('layouts.professeur-app')

@section('content')

<section class="contact-from-section spad">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="col-lg-10 jumbotron">
                <h3 class="mb-5">Participants</h3>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Inscription</th>
                        <th scope="col">Participant</th>
                        <th scope="col">Cours</th>
                        <th scope="col">Prix payé</th>
                        <th scope="col">Votre revenu</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                            <th>{{$payment->created_at}}</th>
                            <td>{{$payment->email}}</td>
                            <td>{{$payment->cours->nom}}</td>
                            <td>{{($payment->montant-(($payment->montant)*18/100))*655}} FCFA</td>
                            <td>{{(($payment->part_professeur-(($payment->part_professeur)*18/100))*655)}} FCFA</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</section>

@endsection
