@extends('modele')

@section('contents')
    <p> --------------------------------------Page d' accueil admin --------------------------------------</p>







    <a type="button" class="btn btn-primary" href="{{route('admin.list')}}">4.1.1.1.	Intégrale. voir la liste integrale des utilisateurs pour 4.1.2.	Acceptation (ou refus),4.1.4.	Modification, 4.1.5.	Suppression  d’un utilisateur    </a><br>
    <a type="button" class="btn btn-primary" href="{{route('admin.trier.trier')}}">4.1.1.2.	Filtre par type (enseignant/gestionnaire).  </a><br>

    <a type="button" class="btn btn-primary" href="{{route('admin.show.recherche')}}">4.1.1.3.	Recherche par nom/prénom/login. </a><br>

    <a type="button" class="btn btn-primary" href="{{route('admin.list')}}">voir la liste des utilisateurs pour 4.1.4.	Modification d’un utilisateur (y compris le type).
        4.1.5.	Suppression d’un utilisateur.
    </a><br>

    <br><br>
    <a type="button" class="btn btn-primary" href="{{route('admin.cree.utlisateuradmin')}}"> 4.1.3.	Création d’un utilisateur admin .  </a> <br>
    <a type="button" class="btn btn-primary" href="{{route('admin.cree.utlisateurenseignant')}}"> 4.1.3.	Création d’un utilisateur enseignant.  </a> <br>
    <a type="button" class="btn btn-primary" href="{{route('admin.cree.utlisateurgestionnaire')}}"> 4.1.3.	Création d’un utilisateur gestionnaire.  </a> <br>

    <br><br>
    <a type="button" class="btn btn-primary" href="{{route('admin.cree.cours',['id'=>Auth::user()->id])}}"> 4.2.1.	Création d’un cours  </a> <br>
    <a type="button" class="btn btn-primary" href="{{route('admin.liste.cours',['id'=>Auth::user()->id])}}">4.2.2la liste des cours pour 4.2.4.	Modification d’un cours.
        4.2.5.	Suppression d’un cours.
    </a> <br>    <a type="button" class="btn btn-primary" href="{{route('admin.show.recherchei')}}">4.2.3.	Recherche par intitulé. </a><br>







    <p> -----annexe--fonction presente dans les autre parties enseignantet gestionnaire-------------------</p>







    <br><br><br><br>    <a type="button" class="btn btn-primary" href="{{route('admin.pointages.coursetudiantss')}}">pointage plusieur etudiant cours</a> <br>


    <a type="button" class="btn btn-primary" href="{{route('admin.modifier.mdp')}}">modifier le mdp du compte</a> <br>

    <a type="button" class="btn btn-primary" href="{{route('admin.modifier.nomprenom',['id'=>Auth::user()->id])}}">modifier nom & prenom des utilisateur</a> <br>


    <a type="button" class="btn btn-primary" href="{{route('admin.cree.etudiant',['id'=>Auth::user()->id])}}">crée un étudiant</a> <br>
    <a type="button" class="btn btn-primary" href="{{route('admin.liste.etudiant',['id'=>Auth::user()->id])}}">afficher la liste des "étudiants"</a> <br>

    <a type="button" class="btn btn-primary" href="{{route('admin.cree.seance',['id'=>Auth::user()->id])}}">crée une seance</a> <br>

    <a type="button" class="btn btn-primary" href="{{route('admin.liste.seance',['id'=>Auth::user()->id])}}">afficher la liste des séances</a> <br>

    <a type="button" class="btn btn-primary" href="{{route('admin.association.coursetudiant',['id'=>Auth::user()->id])}}">crée association cours etudiant</a> <br>
    <a type="button" class="btn btn-primary" href="{{route('admin.dissociation.coursetudiant',['id'=>Auth::user()->id])}}"> dissociation cours etudiant</a> <br>

    <a type="button" class="btn btn-primary" href="{{route('admin.association.coursenseignant',['id'=>Auth::user()->id])}}">crée association cours enseignant</a> <br>
    <a type="button" class="btn btn-primary" href="{{route('admin.dissociation.coursenseignant',['id'=>Auth::user()->id])}}"> dissociation cours enseignant</a> <br>




    <a type="button" class="btn btn-primary" href="{{route('admin.association.coursadesetudiants')}}"> association de plusieurs étudiant à un cours</a> <br>

    <a type="button" class="btn btn-primary" href="{{route('admin.pointage.presentounon')}}"> pointage/presence</a> <br>

    <a type="button" class="btn btn-primary" href="#">afficher liste des presences</a> <br>


    <a type="button" class="btn btn-primary" href="{{route('admin.Enseignant.rechercheenseignantcours')}}">	Voir la liste des cours associés à l'enseignant</a><br>

    <a type="button" class="btn btn-primary" href="{{route('admin.pointage.presentounon')}}">Liste des présents par séance choisie</a><br>





    {{--   <a type="button" class="btn btn-primary" href="{{route('admin.presence.sommaire')}}"> liste des presence</a>  <br>--}}
    {{--    <a type="button" class="btn btn-primary" href="{{route('admin.modifier.etudiant',['id'=>Auth::user()->id])}}">mise à jour d'un étudiant</a> <br>--}}
{{--    <a type="button" class="btn btn-primary" href="{{route('admin.supprimer.etudiant',['id'=>Auth::user()->id])}}">suppresion d'un étudiant</a> <br>--}}
{{--    <a type="button" class="btn btn-primary" href="{{route('admin.cree.seance',['id'=>Auth::user()->id])}}">crée une seance</a> <br>--}}
{{--    <a type="button" class="btn btn-primary" href="{{route('admin.modifier.seance',['id'=>Auth::user()->id])}}">mise à jour d'une seance</a> <br>--}}
{{--    <a type="button" class="btn btn-primary" href="{{route('admin.supprimer.seance',['id'=>Auth::user()->id])}}">suppresion d'une seance</a> <br>--}}

@endsection

