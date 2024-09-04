@extends('admin.base')

@section('title', 'Planification de Maintenance')

@section('content')
<div id="main" class="main">
    <h1>Planification de Maintenance</h1>
    <a href="{{ route('admin.maintenances.create') }}" class="btn btn-primary mb-3">Planifier une Maintenance</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Véhicule</th>
                <th>Date de Maintenance</th>
                <th>Description</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($maintenances as $maintenance)
                <tr>
                    <td>{{ $maintenance->vehicule->marque }} {{ $maintenance->vehicule->modele }}</td>
                    <td>{{ $maintenance->date_maintenance }}</td>
                    <td>{{ $maintenance->description }}</td>
                    <td>{{ $maintenance->statut }}</td>
                    <td>
                        <a href="{{ route('admin.maintenances.edit', $maintenance->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                        <form action="{{ route('admin.maintenances.destroy', $maintenance->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette maintenance ?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
