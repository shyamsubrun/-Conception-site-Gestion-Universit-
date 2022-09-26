@extends('modele')

@section('contents')
    <p>-----------------------association/presence entre un seance et un etudiants-----------------------</p>
    <form method="post">
        <select name="seance" >
            <option value="">--choisir une seance--</option>
            @foreach($seances as $seance)
                <option title="{{$seance->id}}" value="{{$seance->id}}">{{$seance->cours_id}}</option>
            @endforeach
        </select>

            <select name="etudiant" >
                <option value="">--choisir un etudiant--</option>
                @foreach($etudiants as $etudiant)
                    <option title="{{$etudiant->id}}" value="{{$etudiant->id}}">{{$etudiant->nom}} {{$etudiant->prenom}}</option>
                @endforeach
            </select>

        <button type="submit">pointer</button>
        @csrf
    </form>
@endsection
