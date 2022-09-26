@extends('modele')

@section('contents')
    <p>-------------transferer copie association----------------</p>
    <form method="post">
        <legend>choisir le cours ou l'on veut copier les etudiants associer</legend>


        <select name="id_cours" >
            <option value="">--choisir-un-cours--</option>
            @foreach($cours as $cour)
                <option title="{{$cour->id}}" value="{{$cour->id}}">{{$cour->intitule}}</option>
            @endforeach
        </select>
        <br>



        <fieldset>
            <legend>choisir le cours ou l'on veut envoyer les etudiants copier</legend>
            <select name="id_cours" >
                <option value="">--choisir-un-cours--</option>
                @foreach($cours as $cour)
                    <option title="{{$cour->id}}" value="{{$cour->id}}">{{$cour->intitule}}</option>
                @endforeach
            </select>
            <br>

        </fieldset>

        <button type="submit">transferer</button>
        @csrf
    </form>
@endsection
