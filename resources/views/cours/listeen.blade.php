@extends('modele')

@section('contents')
    <p>---------------------liste de cours---------------------</p>

    @unless(empty($cours))
        <table class="table table-hover caption-top" style="box-shadow: 5px 10px 20px rgba(0,0,0, 0.3);">
            <thead class="table-primary">
            <tr>
                <th>id</th>
                <th>intitule</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>modifier</th>
                <th>supprimer</th>
                <th>voir liste association pour un étudiant à uncours</th>
                <th>voir liste association pour un enseignant à un cours</th>
            </tr>
            </thead>
            @forelse($cours as $cour)
                <tr>
                    <td>{{$cour->id}} </td>
                    <td>{{$cour->intitule}}  </td>
                    <td>{{$cour->created_at}}  </td>
                    <td> {{$cour->updated_at}} </td>
                    <td><a href="/enseignant/cours/modifiercours/{{$cour ->id}}">modifier </a></td>
                    <td><a href="/enseignant/supprimercours/{{$cour ->id}}">supprimer</a></td>
                    <td>    <a type="button" class="btn btn-secondary" href="{{route('enseignant.liste.coursetudiant',[$cour->id])}}">afficher liste associations cours etudiant </a> <br></td>
                    <td>    <a type="button" class="btn btn-primary" href="{{route('enseignant.liste.coursenseignant',[$cour->id])}}">afficher liste associations enseignant cours </a> <br></td>

                </tr>

            @empty
                <h4>aucun utlisateur trouvé</h4>
            @endforelse
        </table>

    @endunless
@endsection
