@extends('admin.base')

@section('title', 'Modifier un Véhicule')

@section('content')
<div id="main" class="main">
    <h1>Modifier un Véhicule</h1>

    <!-- Affichage des messages d'erreur globaux -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.vehicules.update', $vehicule->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="marque">Marque</label>
            <input type="text" name="marque" id="marque" class="form-control" value="{{ old('marque', $vehicule->marque) }}" required>
            @error('marque') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="modele">Modèle</label>
            <input type="text" name="modele" id="modele" class="form-control" value="{{ old('modele', $vehicule->modele) }}" required>
            @error('modele') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="année">Année</label>
            <input type="number" name="année" id="année" class="form-control" value="{{ old('année', $vehicule->année) }}" required>
            @error('année') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="numéro_immatriculation">Numéro d'Immatriculation</label>
            <input type="text" name="numéro_immatriculation" id="numéro_immatriculation" class="form-control" value="{{ old('numéro_immatriculation', $vehicule->numéro_immatriculation) }}" required>
            @error('numéro_immatriculation') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="statut_disponibilité">Statut de Disponibilité</label>
            <select name="statut_disponibilité" id="statut_disponibilité" class="form-control" required>
                <option value="1" {{ old('statut_disponibilité', $vehicule->statut_disponibilité) == '1' ? 'selected' : '' }}>Disponible</option>
                <option value="0" {{ old('statut_disponibilité', $vehicule->statut_disponibilité) == '0' ? 'selected' : '' }}>Non Disponible</option>
            </select>
            @error('statut_disponibilité') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="tarif_location">Tarif Location</label>
            <input type="number" name="tarif_location" id="tarif_location" class="form-control" value="{{ old('tarif_location', $vehicule->tarif_location) }}" step="0.01" required>
            @error('tarif_location') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            @if ($vehicule->image)
                <img src="{{ asset('storage/' . $vehicule->image) }}" alt="Image du Véhicule" class="mt-2" style="max-width: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-warning">Mettre à Jour</button>
    </form>
</div>
@endsection
