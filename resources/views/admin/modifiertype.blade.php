@extends('modele')
@section('contents')
    <p>-----------------------modifier type-----------------------</p>

    <form method="post">
        @csrf
        Nom : <input type="text" name="nom" value="{{old('nom', $users->nom)}}"><br>
        prenom  : <input type="text" name="prenom" value="{{old('prenom', $users->prenom)}}"><br>
        <div>
            <input type="radio" id="enseignant" name="type" value="enseignant"
                   >
            <label for="enseignant">Enseignant</label>
        </div>
        <div>
            <input type="radio" id="gestionnaire" name="type" value="gestionnaire"
                   >
            <label for="gestionnaire">Gestionnaire</label>
        </div>
        <div>
            <input type="radio" id="admin" name="type" value="admin"
                   >
            <label for="admin">Admin</label>
        </div>
        <button type="submit">Modifier</button>
    </form>

@endsection
/*admin->gestion */
