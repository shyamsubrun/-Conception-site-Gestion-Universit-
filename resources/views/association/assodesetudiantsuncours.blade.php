@extends('modele')

@section('contents')
    <p>-----------------------association entre une seance et plusieurs etudiants-----------------------</p>
    <form method="post">
        <select name="id_seance" >
            <option value="">--choisir unense--</option>
            @foreach($seances as $seance)
                <option title="{{$seance->id}}" value="{{$seance->id}}">{{$seance->id}}</option>
            @endforeach
        </select>
        <br>



        <fieldset>
            <legend>choisir les etudiants</legend>
            @foreach($etudiants as $etudiant)
                <div>
                    <input value="{{$etudiant->id}}" type="checkbox" name="alle[]">
                    <label title="{{$etudiant->id}}" >{{$etudiant->nom}}{{$etudiant->prenom}}</label>
                </div>
            @endforeach
        </fieldset>

        <button type="submit">associer</button>
        @csrf
    </form>
@endsection
