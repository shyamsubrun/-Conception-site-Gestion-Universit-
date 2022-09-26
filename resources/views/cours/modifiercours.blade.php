@extends('modele')
@section('contents')
    <p>-----------------------modifier cours-----------------------</p>
    <form method="post">
        @csrf
        cours : <input type="text" name="intitule" value="{{$cours->intitule}}"><br>
        <button type="submit">Modifier</button>
    </form>

@endsection
