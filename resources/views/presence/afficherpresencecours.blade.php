@extends('modele')

@section('contents')
    <p>---------------afficher la liste detailler des presences a se cours ----------------</p>

    @unless(empty($cour))
        <table class="table table-hover caption-top" style="box-shadow: 5px 10px 20px rgba(0,0,0, 0.3);">
            <thead class="table-primary">
            <tr>
                <th>etudiant_id</th>

            </tr>
            </thead>
            @forelse($cours as $cour)
                <tr>
                    <td>{{$cour->etudiant_id}} </td>
                </tr>

            @empty
                <h4>aucun etudiants trouvé</h4>
            @endforelse
        </table>
    @endunless
@endsection
