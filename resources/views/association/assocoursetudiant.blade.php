@extends('modele')

@section('contents')
    <p>-----------------------association entre un cours et un etudiants-----------------------</p>
    <form method="post">
        <select name="cours" >cours
            <option value="">--choisir un cours--</option>
            @foreach($cours as $cour)
                <option title="{{$cour->id}}" value="{{$cour->id}}">{{$cour->intitule}}</option>
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
