@extends('modele')
@section('contents')
    <p>----------------------- modifier etudiant----------------------- </p>
    <form method="post">
        @csrf
        nom : <input type="text" name="nom" value="{{$etudiants->nom}}"><br>
        prenom : <input type="text" name="prenom" value="{{$etudiants->prenom}}"><br>
        numero etudiant : <input type="text" name="noet" value="{{$etudiants->noet}}"><br>

        <button type="submit">Modifier</button>
    </form>

@endsection
