@extends('modele')

@section('contents')
    <p>-----------------------association cours-enseignant-----------------------</p>
    <form method="post">
        <select name="cours" >
            <option value="">--choisir un cours--</option>
            @foreach($cours as $cour)
                <option title="{{$cour->id}}" value="{{$cour->id}}">{{$cour->intitule}}</option>
            @endforeach
        </select>

        <select name="enseignant" >
            <option value="">--choisir un enseignant--</option>
            @foreach($enseignants as $enseignant)
                <option title="{{$enseignant->id}}" value="{{$enseignant->id}}">{{$enseignant->nom}} {{$enseignant->prenom}}</option>
            @endforeach
        </select>


        <button type="submit">associer</button>
        @csrf
    </form>
@endsection
