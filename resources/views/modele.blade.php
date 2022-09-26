<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>@yield("tittle")</title>



</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>

    @section('menu')
        @guest()
            <a href="{{route('login')}}">Login</a>
		    <a href="{{route('register')}}">Engristrement</a>
        @endguest
        @auth
            <a href="{{route('logout')}}">Deconnexion</a>
            <p>Bonjour {{Auth::user()->nom}} {{Auth::user()->prenom}}</p>
        @endauth
        @auth
            <a href="{{route('admin.home')}}">Partie admin</a>
            <a href="{{route('gestionnaire.home')}}">Partie gestionnaire</a>
            <a href="{{route('enseignant.home')}}">Partie enseignant</a>
        @endauth
    @show
        @section('etat')
            @if(session()->has('etat'))
                <p class="etat">{{session()->get('etat')}}</p>
            @endif
        @show

@section('errors')
    @if($errors->any())
    <div class="error">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    @endif
@show

    @yield('contents')



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>



</body>

</html>
