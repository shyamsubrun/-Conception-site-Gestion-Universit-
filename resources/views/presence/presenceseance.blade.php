@extends('modele')

@section('contents')
    <p>-----------------------liste des presences par cours des seances-----------------------</p>
    <form method="post" >


        <select name="id" >
            <option value="">--choisir une seance--</option>
            @foreach($seances as $seance)
                <option title="{{$seance->id}}" value="{{$seance->id}}">{{$seance->id}}</option>
            @endforeach
        </select>

        <button type="submit">rechercher</button>
        @csrf
    </form>
@endsection
