@extends('modele')

@section('contents')
    <p>-----------------------les inscrits dans un cours-----------------------</p>
    <form method="post">
        <select name="cours" >
            <option value="">--choisir un cours--</option>
            @foreach($cours as $cour)
                <option title="{{$cour->id}}" value="{{$cour->id}}">{{$cour->intitule}}</option>
            @endforeach
        </select>

        <button type="submit">associer</button>
        @csrf
    </form>
@endsection
