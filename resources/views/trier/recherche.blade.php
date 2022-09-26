@extends('modele')

@section('contents')
    <p>--------------rechercher un etudiant-------------------</p>

        <form action="{{route('admin.trier.recherche')}}">
            <input type="search"  id='recherche' name="s" value="{{request()->s ?? ''}}">
            <input type='submit' value='go' >
        </form>

@endsection
