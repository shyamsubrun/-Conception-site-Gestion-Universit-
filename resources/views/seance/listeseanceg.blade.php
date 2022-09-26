@extends('modele')

@section('contents')
    <p>---------------------liste de seances---------------------</p>

    @unless(empty($seances))
        <table class="table table-hover caption-top" style="box-shadow: 5px 10px 20px rgba(0,0,0, 0.3);">
            <thead class="table-primary">
            <tr>
                <th>id</th>
                <th>nom de la matiere</th>
                <th>date_debut</th>
                <th>date_fin</th>
                <th>modifier</th>
                <th>supprimer</th>
                <th>voir detail</th>

            </tr>
            </thead>
            @forelse($seances as $seance)
                <tr>
                    <td>{{$seance->id}} </td>
                    <td>{{$seance->cours_id}}  </td>
                    <td>{{$seance->date_debut}}  </td>
                    <td>{{$seance->date_fin}}  </td>
                    <td><a href="/gestionnaire/seance/modifierseance/{{$seance ->id}}">modifier </a></td>
                    <td><a href="/gestionnaire/seance/supprimerseance/{{$seance ->id}}">supprimer</a></td>
                    <td>    <a type="button" class="btn btn-primary" href="{{route('gestionnaire.presence.detailler',[$seance->id])}}">voir detail </a> <br></td>

                </tr>

            @empty
                <h4>aucun utlisateur trouvé</h4>
            @endforelse
        </table>
{{--        {{$seances->links()}}--}}
    @endunless
@endsection
