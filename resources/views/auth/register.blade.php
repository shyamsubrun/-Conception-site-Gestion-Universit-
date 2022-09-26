@extends('modele')

@section('contents')
    <p>-----------------------inscription-----------------------</p>
    <form method="post">
        Login: <input type="text" name="login" value="{{old('login')}}">
        nom: <input type="text" name="nom" value="{{old('nom')}}">
        prenom: <input type="text" name="prenom" value="{{old('prenom')}}">
        MDP: <input type="password" name="mdp">
        Confirmation MDP: : <input type="password" name="mdp_confirmation">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
