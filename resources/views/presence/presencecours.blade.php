@extends('modele')

@section('contents')
    <p>-----------------------liste des presences par cours des etudiants-----------------------</p>
    <form action="{{route('gestionnaire.presence.cours')}}" method="post">

        <select name="cours" >
            <option value="">--choisir un cours--</option>
            @foreach($cours as $cour)
                <option title="{{$cour->id}}" value="{{$cour->id}}">{{$cour->intitule}}</option>
            @endforeach
        </select>



        <button type="submit">afficher  liste</button>
        @csrf
    </form>
@endsection
