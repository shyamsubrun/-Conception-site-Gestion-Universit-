@extends('modele')

@section('contents')
    <p>-----------------------créeation d'un étudiant-----------------------</p>
    <form method="post">
        nom: <input type="text" name="nom" value="{{old('nom')}}">
        prenom: <input type="text" name="prenom" value="{{old('prenom')}}">
        numero etudiant: <input type="text" name="noet" value="{{old('noet')}}">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
s
