@extends('modele')

@section('contents')
    <p>-----------------------Enregistrement d'un cours-----------------------</p>
    <form method="post">
        nom du cours: <input type="text" name="intitule" placeholder="math..." value="{{old('intitule')}}">
        <button type="submit">cree cours</button>
        @csrf
    </form>
@endsection
