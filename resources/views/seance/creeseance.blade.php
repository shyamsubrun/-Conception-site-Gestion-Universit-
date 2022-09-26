@extends('modele')

@section('contents')
    <p>-----------------------Enregistrement d'une séance-----------------------</p>
    <form method="post">
        <select name="cours" >
            <option value="">--choisir un cours--</option>
            @foreach($cours as $cour)
            <option title="{{$cour->id}}" value="{{$cour->id}}">{{$cour->intitule}}</option>
            @endforeach
        </select>

        <label for="start">debut de la seance:</label>
        <input type="date" id="start" name="date_debut"
               min="2022-01-01" max="2031-12-31">

        <label for="start">fin de la seance:</label>
        <input type="date" id="start" name="date_fin"
               min="2022-01-01" max="2031-12-31">

        <button type="submit">cree seance</button>
        @csrf
    </form>
@endsection
