@extends('layouts.app')

@section('content')

<section class="hero-section set-bg" data-setbg="{{ asset('img/hero.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="hero-text">
                    <h2>Apprenez d'où vous voulez avec <span class="academia">Yes We Learn GABON</span></h2>
                    <ul class="list-group">
                        <li class="list-group-item">Tous les programmes de la 6e en Tle</li>
                        <li class="list-group-item">Toutes les épreuves du BEPC et du baccalauréat depuis 2000</li>
                        <li class="list-group-item">Cours hors ligne</li>
                        <li class="list-group-item">Cours en podcast</li>
                        <li class="list-group-item">Cours préparés et rédigés par les meilleurs</li>
                        <li class="list-group-item">Cours à domicile avec nos partenaires</li>
                        <li class="list-group-item">Cours par petits groupes</li>
                        <li class="list-group-item">Prépa examens gabonais</li>
                        <li class="list-group-item">Prépa examens français</li>
                    </ul>
                    <a href="#" class="btn primary-btn my-5 btn-success">Rejoindre la plateforme</a>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('img/hero-right.png') }}" alt="">
            </div>
        </div>
    </div>
</section>


<section class="home-about-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="ha-pic mt-5">
                <img src="{{asset('img/michel_dirat.jpeg')}}" alt="complexe_michel_dirat" width="550px">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ha-text">
                    <h2>À propos de <span class="academia">Yes we learn GABON</span></h2>
                    <p> Yes We Learn GABON est un site internet de formation en ligne à destination des étudiants gabonais créé dans l'optique d'améliorer l'apprentissage lors de la crise sanitaire</p>
                    <ul>
                        <li><i class="fas fa-check"></i> Plus de 30 formateurs organisés performants, compétents et à l'écoute</li>
                        <li><i class="fas fa-check"></i> Salles et environnements de travail spacieux et climatisés </li>
                        <li><i class="fas fa-check"></i> Adaptabilité du soutient en fonction de chaque élève</li>
                        <li><i class="fas fa-check"></i> Plus de 200 cours et épreuves d'examens corrigés disponibles</li>
                        <li><i class="fas fa-check"></i> Contenu vidéo</li>
                    </ul>
                    <a href="#" class="link">Voir les cours</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team-member-section" >
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Nos formateurs</h2>
                    <p>Voici les formateurs actifs de la plateforme. Vous aussi dès à présent devenez formateurs et créez votre premier cours !</p>
                </div>
            </div>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="https://uploads-ssl.webflow.com/5bddf05642686caf6d17eb58/5dc2fd00c29f7abeadd7c332_gPZwCbdS.jpg">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text text-center">
            <h5>Florent NICOLAS</h5>
            <span>Formateur</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="https://uploads-ssl.webflow.com/5bddf05642686caf6d17eb58/5dc2fd00c29f7abeadd7c332_gPZwCbdS.jpg">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text text-center">
            <h5>Florent NICOLAS</h5>
            <span>Formateur</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="https://uploads-ssl.webflow.com/5bddf05642686caf6d17eb58/5dc2fd00c29f7abeadd7c332_gPZwCbdS.jpg">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text text-center">
            <h5>Florent NICOLAS</h5>
            <span>Formateur</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="https://uploads-ssl.webflow.com/5bddf05642686caf6d17eb58/5dc2fd00c29f7abeadd7c332_gPZwCbdS.jpg">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text text-center">
            <h5>Florent NICOLAS</h5>
            <span>Formateur</span>
        </div>
    </div>
    <div class="member-item set-bg" data-setbg="https://uploads-ssl.webflow.com/5bddf05642686caf6d17eb58/5dc2fd00c29f7abeadd7c332_gPZwCbdS.jpg">
        <div class="mi-social">
            <div class="mi-social-inner bg-gradient">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <div class="mi-text text-center">
            <h5>Florent NICOLAS</h5>
            <span>Formateur</span>
        </div>
    </div>
</section>

<!--Section: Contact v.2-->
<section class="mb-4 container">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contactez nous</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5" >Vous avez des question? S'il vout plait n'hésitez pas à nous contacter directement. L'équipe <span>Yes We Learn GABON</span> vous recontactera avec grand plaisr et dans les plus brefs délais peu importe votre question.</p>

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

<section class="newslatter-section mb-5 pb-5">
    <div class="container">
        <div class="newslatter-inner set-bg" data-setbg="img/newslatter-bg.jpg">
            <div class="ni-text">
                <h3>S'abonner à notre newsletter</h3>
                <p>Restez informés des derniers cours mis en ligne !</p>
            </div>
            <form action="#" method="POST" class="ni-form">
                <input type="text" placeholder="Votre adresse email" name="email">
                <button type="submit">M'abonner</button>
            </form>
        </div>
    </div>
</section>

@endsection
