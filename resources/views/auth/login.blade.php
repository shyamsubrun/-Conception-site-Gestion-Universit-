@extends('modele')

@section('contents')
    <div style="background: #ffe7e5; border: 2px solid #e66465;">
        <p style="margin: 15px; line-height: 1.5; text-align: center;">
            se<br>
            connecter:</p>
    </div>
    <form method="post">
        Login: <input type="text" name="login" value="{{old('login')}}">
        MDP: <input type="password" name="mdp">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection
