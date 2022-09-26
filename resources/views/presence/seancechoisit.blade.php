@extends('modele')

@section('contents')
    <p>-----------------------presence par seance choisit-----------------------</p>
    <form method="post">
        <select name="cours" >
            <option value="">--choisir une seance--</option>
            @foreach($seances as $seance)
                <option title="{{$seance->id}}" value="{{$seance->id}}">{{$seance->intitule}}</option>
            @endforeach
        </select>



        <button type="submit">associer</button>
        @csrf
    </form>
@endsection
