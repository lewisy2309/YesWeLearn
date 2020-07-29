@php

use App\Cours;
use App\Photo;
use App\Statut;
use App\Payment;


    $cours=Cours::all();
    $coursUser= Payment::where('email',Auth::user()->email)->limit(4)->get();
    $photo=Photo::all();
    $statut=Statut::all();


@endphp

<div class="">
    <div class="container-fluid">
        <div class="nav-menu">
            <div class="mainmenu mobile-menu">
                <ul class="" >
                    <li class="active">
                        <a href="{{route('acceuil')}}">
                            <i class="fas fa-home"></i>
                            Accueil
                        </a>
                    </li>
                    @if (Auth::user()->statut_id===3)


                    <li class="">
                        <a href="{{route('acceuil')}}">
                            <i class="fas fa-users-cog"></i>
                            admninistrer
                        </a>
                        <ul class="dropdown px-2 py-3">
                            <li>
                                <a  href="{{route('demandeformateur')}}">
                                    Voir les demandes de Professeur à intégrer la plateforme
                                </a>
                            </li>
                            <hr>

                            <li>
                                <a class="px-2" href="{{route('upgradeutilisateur')}}">
                                    Upgrader un utilisateur
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li>
                        <a href="{{route('affichercours')}}">
                            <i class="fas fa-ellipsis-v"></i>
                            Suivre un cours
                        </a>
                        <ul class="dropdown px-2 py-3">
                            <li>
                                <a href="#">
                                    Catégorie
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    </li>
                    <li>
                        <a href="#" >
                            <i class="fas fa-chalkboard-teacher"></i>
                            Formateur
                        </a>
                        <ul class="dropdown px-2 py-3">
                            @if (Auth::user()->statut_id===2 || Auth::user()->statut_id===3)


                            <li>
                                <a  href=" {{route('vueprofilprofesseur')}} ">
                                    Voir mes cours ou ajouter un nouveau cours
                                </a>
                            </li>
                            <hr>

                            <li>
                                <a class="px-2" href=" {{route('ajouterenonceexamen')}} ">
                                    Voir Les sujets d'examens que j'ai rajouté ou en rajouter d'autres
                                </a>
                            </li>
                            <hr>

                            @endif
                            @if (Auth::user()->statut_id===1)
                                <li>
                                    <a class="px-2" href=" {{route('demandeprofesseur')}} ">
                                        Envoyer une demande pour être formateur sur la plateforme
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('mescours')}}">
                            <i class="fas fa-book"></i>
                            Mes cours
                        </a>
                        <ul class="dropdown">
                            @if (count($coursUser)>0)
                                @foreach ($coursUser as $mescours)
                                    <li>
                                        <div class="d-flex  ml-2 my-3">
                                            <img class="avatar border-rounded" src="/storage/cours/{{$mescours->cours->user_id}}/{{$mescours->cours->image}}"/>
                                            <div class="user-infos">
                                                <a href="#"><small>{{$mescours->cours->nom}}</small></a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('panierafficher')}}">
                            <i class="fas fa-shopping-cart"></i>
                            @if (count(\Cart::session(Auth::user()->id)->getContent())>0)
                                <span class="badge badge-pill badge-success">{{count(\Cart::session(Auth::user()->id)->getContent())}}</span>
                            @endif
                        </a>
                        @if (count(\Cart::session(Auth::user()->id)->getContent())>0)
                        <ul class="dropdown px-2 py-2">
                            @foreach (\Cart::session(Auth::user()->id)->getContent() as $item)
                            <li>
                                <div class="d-flex">
                                <img class="avatar border-rounded" src="/storage/cours/{{$item->model->user_id}}/{{$item->model->image}}"/>
                                    <div class="user-infos ml-3">
                                        <small>{{$item->model->nom}}</small>
                                        <p class="text-success">{{$item->model->prix}} fcfa</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @else
                            <ul class="dropdown px-2 py-2">
                                <li>
                                    <div class="">
                                    Votre panier est vide. Continuez vos achat <a class="btn btn-success" href="{{route('affichercours')}}"> ici </a>
                                    </div>
                                </li>
                            </ul>
                        @endif
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-heart"></i>
                            @if (count(\Cart::session(Auth::user()->id.'_coupDeCoeur')->getContent())>0)
                                <span class="badge badge-pill badge-success">{{count(\Cart::session(Auth::user()->id.'_coupDeCoeur')->getContent())}}</span>
                            @endif
                        </a>
                        <ul class="dropdown px-2 py-2">
                            @if (count(\Cart::session(Auth::user()->id.'_coupDeCoeur')->getContent())>0)
                            @foreach (\Cart::session(Auth::user()->id.'_coupDeCoeur')->getContent() as $coupDeCoeur)

                            <li>
                                <div class="d-flex">
                                <img class="avatar border-rounded" src="/storage/cours/{{$coupDeCoeur->model->user_id}}/{{$coupDeCoeur->model->image}}"/>
                                    <div class="user-infos ml-3">
                                        <small>{{$coupDeCoeur->model->nom}}</small>
                                        <p class="text-danger">{{$coupDeCoeur->price}} FCFA</p>
                                    </div>
                                </div>
                            </li>

                            @endforeach
                            @else

                                <li>
                                    <div class="">
                                    Vous n'avez pas encore eut de coup de coeur sur la plateforme Yes We Learn GABON. Continuez l'exploration de notre site <a class="btn btn-success" href="{{route('affichercours')}}"> ici </a>
                                    </div>
                                </li>

                            @endif
                        </ul>
                    </li>
                    <li>
                    <a class="nav-link" href="{{route('monprofil')}}">
                            <img class="avatar-profile border-rounded rounded-circle " src="{{Auth::user()->photo ? '/storage/photo_de_profil/'.Auth::user()->id.'/'.Auth::user()->photo->location : asset('img/avatar.png') }}"/>
                        </a>
                        <ul class="dropdown">
                            <li>
                                <div class="d-flex justify-content-between py-3 px-3">
                                    <div class="user-infos">
                                        <p>{{ Auth::user()->name }}</p>
                                        <small>{{ Auth::user()->email }}</small>
                                    </div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
                            <li><a href=" {{ route('logout')}} "><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
