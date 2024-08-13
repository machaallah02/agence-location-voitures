@extends('admin.base')

@section('title', 'Ajouter un Véhicule')

@section('content')
<div id="main" class="main">
    <h1>Ajouter un Véhicule</h1>

    <form action="{{ route('admin.vehicules.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="marque">Marque</label>
            <input type="text" name="marque" id="marque" class="form-control" value="{{ old('marque') }}" required>
            @error('marque') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="modele">Modèle</label>
            <input type="text" name="modele" id="modele" class="form-control" value="{{ old('modele') }}" required>
            @error('modele') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="année">Année</label>
            <input type="number" name="année" id="année" class="form-control" value="{{ old('année') }}" required>
            @error('année') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="numéro_immatriculation">Numéro d'Imma</label>
            <input type="text" name="numéro_immatriculation" id="numéro_immatriculation" class="form-control" value="{{ old('numéro_immatriculation') }}" required>
            @error('numéro_immatriculation') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="statut_disponibilité">Statut de Disponibilité</label>
            <select name="statut_disponibilité" id="statut_disponibilité" class="form-control" required>
                <option value="1" >Disponible</option>
                <option value="0" >Non Disponible</option>
            </select>
            @error('statut_disponibilité') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        

        <div class="form-group">
            <label for="tarif_location">Tarif Location</label>
            <input type="number" name="tarif_location" id="tarif_location" class="form-control" value="{{ old('tarif_location') }}" step="0.01" required>
            @error('tarif_location') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control" required>
            @error('image') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
