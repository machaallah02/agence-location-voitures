@extends('base')

@section('title', 'Tous les Véhicules')

@section('content')
<section class="section__all_vehicles section-all-padding">
    <div class="container">
        <div class="section__title">
            <h1>Tous les Véhicules</h1>
            <p>Découvrez notre large gamme de véhicules disponibles à la location.</p>
        </div>

        <div class="vehicles-grid">
            @foreach($vehicules as $vehicule)
                <div class="vehicle-card">
                    <a href="{{ route('vehicule.details', $vehicule->id) }}">
                        <div class="vehicle-card__preview">
                            <img src="{{ asset('storage/' . $vehicule->image) }}" alt="{{ $vehicule->marque }} {{ $vehicule->modele }}">
                        </div>
                        <div class="vehicle-card__info">
                            <h3 class="vehicle-card__title">{{ $vehicule->marque }} {{ $vehicule->modele }}</h3>
                            <p class="vehicle-card__details">
                                <span>Année : {{ $vehicule->année }}</span>
                                <span>Tarif : ${{ $vehicule->tarif_location }} par jour</span>
                            </p>
                            <p class="vehicle-card__description">{{ Str::limit($vehicule->description, 100) }}</p>
                            <div class="vehicle-card__actions">
                                <a href="{{ route('reservation', ['vehicule' => $vehicule->id]) }}" class="btn btn-primary">Réservez</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
