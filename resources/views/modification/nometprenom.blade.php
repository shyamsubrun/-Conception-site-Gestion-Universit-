@extends('modele')
@section('contents')
    <p>-----------------------modifier nom et prenom-----------------------</p>

    <form method="post">
        @csrf
        Nom : <input type="text" name="nom" value="{{ $users->nom }}"><br>
        prenom : <input type="text" name="prenom" value="{{ $users->prenom }}"><br>
        <button type="submit">Modifier</button>
    </form>

@endsection
