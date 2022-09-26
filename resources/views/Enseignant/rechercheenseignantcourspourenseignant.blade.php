@extends('modele')

@section('contents')

    @unless(empty($users))
        <table class="table table-hover caption-top" style="box-shadow: 5px 10px 20px rgba(0,0,0, 0.3);">
            <thead class="table-primary">
            <tr>
                <th>id</th>
                <th>login</th>
                <th>nom</th>
                <th>prenom</th>
                <th>type</th>
                <th>Action</th>
            </tr>
            </thead>
            @forelse($users as $user)
                <tr>
                    <td>{{$user->id}} </td>
                    <td>{{$user->login}}  </td>
                    <td>{{$user->nom}}  </td>
                    <td> {{$user->prenom}} </td>
                    <td> {{$user->type}} </td>
                    <td><a type="button" class="btn btn-secondary" href="{{route('enseignant.show.rechercheenseignantcoursss',[$user->id])}}">rechercher ses cours </a> <br></td>
                </tr>
            @empty
                <h4>aucun utlisateur trouvé</h4>
            @endforelse
        </table>
    @endunless
@endsection
