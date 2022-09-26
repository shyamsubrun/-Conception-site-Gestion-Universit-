@extends('modele')

@section('contents')
    <p>-----------------------Page d' accueil Gestionnaire-----------------------</p>

    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.cree.etudiant',['id'=>Auth::user()->id])}}">2.1.1.	Ajout d’un étudiant. </a> <br>
    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.liste.etudiant',['id'=>Auth::user()->id])}}">2.5.1.	Liste des étudiants (avec pagination) qui inclut 2.1.2.	Mise à jour de l’étudiant.
        2.1.3.	Suppression de l’étudiant.
    </a> <br><br>



    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.cree.seance',['id'=>Auth::user()->id])}}">2.2.1.	Création d’une nouvelle séance de cours. </a> <br>

    </a>

    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.liste.seance',['id'=>Auth::user()->id])}}">	Liste des séances   qui inclut 2.2.2.	Mise à jour d’une séance de cours.
        2.2.3.	Suppression d’une séance de cours.
    </a> <br><br>




    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.association.coursetudiant',['id'=>Auth::user()->id])}}">2.3.1.	Associer des étudiants au cours (individuellement). </a> <br>
    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.dissociation.coursetudiant',['id'=>Auth::user()->id])}}"> 2.3.2.	Supprimer l’association (individuellement). </a> <br>

    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.liste.cours',['id'=>Auth::user()->id])}}">afficher la liste pour-2.3.3. Liste des étudiants associés à un cours.  </a> <br>


    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.transfere.cop',['id'=>Auth::user()->id])}}">2.3.4.	Copier toutes les associations d’un cours vers un autre cours.    </a> <br>


    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.pointages.coursetudiantss',['id'=>Auth::user()->id])}}">2.3.5.	Associer des étudiants au cours (plusieurs d’un coup).  </a> <br>

    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.supprimer.coursetudiantsplusieur',['id'=>Auth::user()->id])}}">2.3.6.	Supprimer l’association (plusieurs d’un coup).   </a> <br>
    <br><br>
    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.association.coursenseignant',['id'=>Auth::user()->id])}}">2.4.1.	Associer des enseignants au cours. </a> <br>
    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.dissociation.coursenseignant',['id'=>Auth::user()->id])}}"> 2.4.2.	Supprimer l’association. </a> <br>
    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.liste.cours',['id'=>Auth::user()->id])}}">afficher la liste des cours pour avoir  2.4.3.Liste des enseignants associés à un cours.  </a> <br>




    <br><br>
    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.show.recherche')}}">2.5.2.	Recherche des étudiants. </a><br>

    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.liste.cours',['id'=>Auth::user()->id])}}">2.5.3.	Liste des cours</a> <br>
    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.liste.cours',['id'=>Auth::user()->id])}}">2.5.4.	Liste des séances pour un cours (avec pagination).  </a> <br>

    <br><br>
    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.presence.detaillee',['id'=>Auth::user()->id])}}">2.6.1. Liste de présences détaillée (par étudiant) </a> <br>




    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.presence.séance',['id'=>Auth::user()->id])}}">2.6.2. Liste des présences (des étudiants) par séance. </a> <br>




    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.presence.cours',['id'=>Auth::user()->id])}}">2.6.3. Liste des présences (des étudiants) par cours. </a> <br>
    <br><br>


    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.modifier.mdp')}}">3.1.2.	Changement de son mot de passe. </a> <br>
    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.modifier.nomprenom',['id'=>Auth::user()->id])}}">3.1.3.	Modification du nom/prénom. </a> <br>
    <br><br>
{{--    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.show.recherche')}}">rechercher etudiant</a><br>--}}

{{--    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.liste.seance',['id'=>Auth::user()->id])}}">afficher la liste des séances</a> <br>--}}
{{--    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.liste.cours',['id'=>Auth::user()->id])}}">afficher la liste des cours</a> <br>--}}


{{--    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.Enseignant.rechercheenseignantcours',['id'=>Auth::user()->id])}}">	Voir la liste des cours associés à l'enseignant</a><br>--}}



@endsection
