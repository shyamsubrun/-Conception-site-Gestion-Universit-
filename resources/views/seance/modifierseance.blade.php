@extends('modele')
@section('contents')
    <p>-----------------------modifier seance-----------------------</p>
    <form method="post">
        @csrf
        id du cours: <input type="text" name="intitule" value="{{$seances->cours_id}}" readonly="readonly"><br>
        <p><label for="start">nouveau debut de la seance:</label>
        <input type="date" id="start" name="date_debut" value="{{$seances->date_fin}}"
        min="2022-01-01" max="2031-12-31"></p>

        <p><label for="start"> nouvelle fin de la seance:</label>
        <input type="date" id="start" name="date_fin"
               value="{{$seances->date_fin}}"
               min="2022-01-01" max="2031-12-31"></p>
        <button type="submit">modifier seance</button>

    </form>

@endsection
