@extends('modele')

@section('contents')
    <p>-----------------------association entre une seance et un etudiant-----------------------</p>
    <form method="post">
        <select name="cours" >
            <option value="">--choisir une seance--</option>
            @foreach($seances as $seance)
                <option title="{{$seance->id}}" value="{{$seance->id}}">{{$seance->intitule}}</option>
            @endforeach
        </select>

        <select name="etudiant" >
            <option value="">--choisir un etudiant--</option>
            @foreach($etudiants as $etudiant)
                <option title="{{$etudiant->id}}" value="{{$etudiant->id}}">{{$etudiant->nom}} {{$etudiant->prenom}}</option>
            @endforeach
        </select>


        <button type="submit">associer</button>
        @csrf
    </form>
@endsection
