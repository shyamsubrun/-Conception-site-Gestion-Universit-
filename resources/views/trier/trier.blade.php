@extends('modele')

@section('contents')
    <p>-----------------------trier par type-----------------------</p>
    <form method="post">
        <select name="type" >
            <option value="">--choisir type à trier--</option>

            <option value="null">type null</option>


            <option value="admin">type admin</option>

            <option value="gestionnaire">gestionnaire</option>

            <option value="enseignant">enseignant</option>


        </select>

        <button type="submit">trier</button>
        @csrf
    </form>
@endsection
