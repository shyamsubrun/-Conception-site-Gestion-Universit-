@extends('modele')

@section('contents')
    <p>-----------------------Page d' accueil Enseignant-----------------------</p>

    <a type="button" class="btn btn-primary" href="{{route('enseignant.modifier.mdp')}}">3.1.2.	Changement de son mot de passe. </a> <br>
    <a type="button" class="btn btn-primary" href="{{route('enseignant.modifier.nomprenom',['id'=>Auth::user()->id])}}">3.1.3.	Modification du nom/prénom. </a> <br>

    <a type="button" class="btn btn-primary" href="{{route('enseignant.Enseignant.rechercheenseignantcours',['id'=>Auth::user()->id])}}">	1.1.	Voir la liste des cours associés.   </a><br>
    <a type="button" class="btn btn-primary" href="{{route('enseignant.liste.inscritcours',['id'=>Auth::user()->id])}}">	1.2.1. Liste des inscrits dans un cours. </a>

    <br> <a type="button" class="btn btn-primary" href="{{route('enseignant.pointage.presentounon')}}"> 1.2.2.	Pointage d’un étudiant pour la séance.  </a>


    <br>    <a type="button" class="btn btn-primary" href="{{route('enseignant.pointages.coursetudiantss')}}">1.2.3.	Pointage de plusieurs étudiants d’un coup pour la séance.


    <a type="button" class="btn btn-primary" href="{{route('enseignant.presence.seancechoisit')}}"> 1.2.4. Liste des présents/absents par séance choisie.
    </a> <br>
    </a> <br>
@endsection
