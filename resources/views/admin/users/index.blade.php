@extends('admin.base')

@section('title', 'Liste des utilisateurs')

@section('content')
    <div id="main" class="main">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Liste des utilisateurs</h1>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Ajouter un utilisateur</a>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info"><i
                                    class="bi bi-eye"></i></a>
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><i
                                    class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
