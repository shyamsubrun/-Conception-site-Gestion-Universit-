@extends('modele')

@section('contents')
    <p>-----------------------liste utilisateur-----------------------</p>

    @unless(empty($users))
        <table class="table table-hover caption-top" style="box-shadow: 5px 10px 20px rgba(0,0,0, 0.3);">
            <thead class="table-primary">
            <tr>
                <th>id</th>
                <th>login</th>
                <th>nom</th>
                <th>prenom</th>
                <th>type</th>
                <th>valider user</th>
                <th>supprimer user</th>
            </tr>
            </thead>
            @forelse($users as $user)
                <tr>
                    <td>{{$user->id}} </td>
                    <td>{{$user->login}}  </td>
                    <td>{{$user->nom}}  </td>
                    <td> {{$user->prenom}} </td>
                    <td> {{$user->type}} </td>
                    <td><a href="{{route('admin.modifier.type',['id'=>$user->id])}}">modifier ou valider</a></td>
                    <td><a href="{{route('admin.supprimer.user',['id'=>$user->id])}}">supprimer</a></td>
                </tr>

            @empty
                <h4>aucun utlisateur trouvé</h4>
            @endforelse
        </table>
    @endunless
@endsection

