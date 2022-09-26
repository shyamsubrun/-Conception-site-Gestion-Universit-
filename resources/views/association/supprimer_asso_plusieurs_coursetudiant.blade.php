@extends('modele')

@section('contents')
    <p>------------supprimer plusieur d'un coup etudiant cours----------------</p>
    <form method="post">
        <select name="id_cours" >
            <option value="">--choisir-un-cours--</option>
            @foreach($cours as $cour)
                <option title="{{$cour->id}}" value="{{$cour->id}}">{{$cour->intitule}}</option>
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

        <button type="submit">Supprimer</button>
        @csrf
    </form>
@endsection
