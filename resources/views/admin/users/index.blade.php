@extends('admin.base')

@section('title', 'Liste des utilisateurs')

@section('content')
<div id="main" class="main">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Liste des utilisateurs</h1>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Ajouter un utilisateur</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
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
            @foreach($users as $user)
            <tr>
                <td>{{ $user->nom }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info">Voir</a>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Modifier</a>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    @if(session('success'))
        Toastify({
            text: "{{ session('success') }}",
            duration: 3000,
            gravity: "top",
            position: "right",
            style: {
                background: "#28a745",
            },
        }).showToast();
    @endif

    @if($errors->any())
        Toastify({
            text: "Veuillez corriger les erreurs dans le formulaire.",
            duration: 3000,
            gravity: "top",
            position: "right",
            style: {
                background: "#dc3545",
            },
        }).showToast();
    @endif
</script>
@endsection
