@extends('modele')

@section('contents')
    <p>---------------------liste de etudiants---------------------</p>

    @unless(empty($etudiants))
        <table class="table table-hover caption-top" style="box-shadow: 5px 10px 20px rgba(0,0,0, 0.3);">
            <thead class="table-primary">
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>prenom</th>
                <th>modifier</th>
                <th>supprimer</th>
            </tr>
            </thead>
            @forelse($etudiants as $etudiant)
                <tr>
                    <td>{{$etudiant->id}} </td>
                    <td>{{$etudiant->nom}}  </td>
                    <td>{{$etudiant->prenom}}  </td>
                    <td><a href="/enseignant/etudiant/modifieretudiant/{{$etudiant ->id}}">modifier </a></td>
                    <td><a href="/enseignant/etudiant/supprimeretudiant/{{$etudiant ->id}}">supprimer</a></td>
                </tr>

            @empty
                <h4>aucun etudiants trouvé</h4>
            @endforelse
        </table>
        {{$etudiants->links()}}
    @endunless
@endsection
