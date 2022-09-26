@extends('modele')
@section('contents')
    <p>-----------------------modifier mots de passe-----------------------</p>

    <form method="post">
        @csrf
        Mot de passe : <input type="password" name="mdp"><br>
        Confirmation mot de passe : <input type="password" name="mdp_confirmation"><br>
        <button type="submit">Modifier</button>
    </form>

@endsection
