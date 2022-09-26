@extends('modele')

@section('contents')
    <p>-----------------------liste des presences detailler par etudiant-----------------------</p>
    <form method="post" >
{{--/*action="{{route('gestionnaire.presence.detaillee',[$etudiants->id])}}"*/--}}
        <select name="etudiant" >
            <option value="">--choisir un etudiant--</option>
            @foreach($etudiants as $etudiant)
                <option title="{{$etudiant->id}}" value="{{$etudiant->id}}">{{$etudiant->nom}} {{$etudiant->prenom}}</option>
            @endforeach
        </select>
        <button type="submit">rechercher</button>
        @csrf
    </form>
@endsection
