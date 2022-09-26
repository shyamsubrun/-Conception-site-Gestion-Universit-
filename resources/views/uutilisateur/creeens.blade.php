@extends('modele')

@section('contents')
    <p>-----------------------crée un nouvel utilisateur enseignant -----------------------</p>
    <form method="POST" >
        Login: <input type="text" name="login" >
        nom: <input type="text" name="nom" >
        prenom: <input type="text" name="prenom" >
        MDP: <input type="password" name="mdp">
        Confirmation MDP: : <input type="password" name="mdp_confirmation">
        <input type="submit" value="Crée">
        @csrf
    </form>
@endsection
