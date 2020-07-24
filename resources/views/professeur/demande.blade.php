@extends('layouts.app')

@section('content')

<section class="hero-section set-bg" class="bgcontain" data-setbg="{{ asset('img/conference.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-text">
                    <h2 class="white-colored">Participez à l'expension de l'éducation avec <span class="academia">Yes We Learn GABON</span></h2>
                    <p class="white-colored">Créez vos cours et Monétisez votre savoir et votre expérience tout en aidant l'élite de demain à accéder au savoir</p>

                    @if ($demandes->count()<0)
                    <a href="{{route('demandeprofesseurenvoie')}}" class="btn primary-btn my-5 btn-success">Devenir formateur au sein de la plateforme</a>
                    @else
                    <p class="btn btn-primary btn-success">
                        <i class="fas fa-check-double"></i>
                        Votre demande pour être formateur au sein de la plateforme a bien été pris en compte et est actuellement en attente
                    </p>
                    @endif</div>
            </div>
        </div>
    </div>
</section>


<section class="home-about-section spad">
    <div class="container">
        <div class=" ">

                <h2 class="section-title title-after" style="position: relative"><span class="academia">Aidez</span> nous à <span class="academia">aider</span></h2>

                <div class="d-flex justify-content-space-around section-title">
                    <div class="container">
                        <i class="fa fa-funnel-dollar icon-presentation fa-3x"></i>
                        <h4 class='demande-sous-titre'>Arrondissez vos fins de mois</h4>
                        <p class='demande-sous-titre-description'>Encaissez de l'argent à chaque fois qu'un de vos cours est acheté sur la plateforme. Vos revenus vous sont versés tous les mois par virement ou par un moyen de votre choix</p>
                    </div>

                    <div class="container">
                        <i class="fa fa-chalkboard-teacher icon-presentation fa-3x"></i>
                        <h4 class='demande-sous-titre'>Faites profiter un maximum de personnes de vos connaissances </h4>
                        <p class='demande-sous-titre-description'>En devenant professeur au sein de la plateforme, vous pouurez donner acces à la connaissance à un maximum de personnes et les faire évoluer dans leurs cursus scolaire et éventuellement leur carrière professionelle</p>
                    </div>

                    <div class="container">
                        <i class="fa fa-users icon-presentation fa-3x"></i>
                        <h4 class='demande-sous-titre'>Faites parti de la communauté</h4>
                        <p class='demande-sous-titre-description'>Rejoinger une communauté de formateurs et bénéficiez de l'aide de nos équipes 24/7 </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="hero-section set-bg" class="bgcontain" data-setbg="{{ asset('img/elearning.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 d-flex justify-content-end">
                <div class="ha-text">
                    <h2 class="white-colored" style="color: blue">Devenez formateur en quelques étapes</h2>
                    <ul class="list-group">

                        <li class="list-group-item">1-Batissez un plan d'enregistrement de vos cours</li>
                        <li class="list-group-item">2-Enregistrez les cours</li>
                        <li class="list-group-item">3-Mettez les en ligne</li>
                        <li class="list-group-item">4-Développez votre communauté</li>
                        <li class="list-group-item">5-Encaissez vos revenus</li>

                    </ul>
                    @if ($demandes->count()<0)
                    <a href="{{route('demandeprofesseurenvoie')}}" class="btn primary-btn my-5 btn-success">Devenir formateur au sein de la plateforme</a>
                    @else
                    <p class="btn btn-primary btn-success">
                        <i class="fas fa-check-double"></i>
                        Votre demande pour être formateur au sein de la plateforme a bien été pris en compte et est actuellement en attente
                    </p>
                    @endif
                   </div>
            </div>
        </div>
    </div>
</section>

<!--Section: Contact v.2-->
<section class="mb-4 container">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contactez nous</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5" >Vous avez des question? S'il vout plait n'hésitez pas à nous contacter directement. L'équipe <span>Yes We Learn GABON</span> vous recontactera avec grand plaisir et dans les plus brefs délais peu importe votre question.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="" method="POST">
                @csrf

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Votre nom</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Votre email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Subjet</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">votre message</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-left">
                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Envoyer</a>
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li>
                    <i class="fas fa-search-location"></i>
                    <p>libreville ,GABON</p>
                </li>

                <li>
                    <i class="fas fa-phone"></i>
                    <p>062250326</p>
                </li>

                <li>
                    <i class="fas fa-envelope-open-text"></i>
                    <p>contact@yeswelearngabon.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->




@stop
