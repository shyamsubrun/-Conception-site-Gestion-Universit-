@extends('modele')

@section('contents')
    <p>-----------------------crée un nouvel utilisateur admin -----------------------</p>
    <form action="{{route('admin.cree.utlisateuradmin')}}"method="POST" >
        Login : <input type="text" name="login" >
        nom:  <input type="text" name="nom" >
        prenom:  <input type="text" name="prenom" >
        MDP: <input type="password" name="mdp">
        Confirm MDP:  <input type="password" name="mdp_confirmation">
        <input type="submit" value="Crée">
        @csrf
    </form>

@endsection
