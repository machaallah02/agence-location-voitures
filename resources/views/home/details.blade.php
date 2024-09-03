@extends('base')

@section('title', 'Détails du Véhicule')

@section('content')

<section class="section__vehicle_details section-all-padding">
    <div class="container">
        <div class="row">
            <!-- Image du véhicule -->
            <div class="col-md-6">
                <div id="vehicule-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('storage/' . $vehicule->image) }}" class="d-block w-100 vehicule-img" alt="{{ $vehicule->marque }} {{ $vehicule->modele }}">
                        </div>
                        <!-- Ajoutez plus d'images ici si nécessaire -->
                        @if(isset($vehicule->images) && count($vehicule->images) > 0)
                            @foreach($vehicule->images as $image)
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/' . $image) }}" class="d-block w-100 vehicule-img" alt="{{ $vehicule->marque }} {{ $vehicule->modele }}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- Contrôles du carrousel -->
                    @if(isset($vehicule->images) && count($vehicule->images) > 0)
                        <a class="carousel-control-prev" href="#vehicule-carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Précédent</span>
                        </a>
                        <a class="carousel-control-next" href="#vehicule-carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Suivant</span>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Informations du véhicule -->
            <div class="col-md-6">
                <h1 class="vehicule-title">{{ $vehicule->modele }}</h1>
                <h4 class="text-muted">{{ $vehicule->marque }}</h4>
                <p class="vehicule-description">{{ $vehicule->description }}</p>
                <h3 class="text-primary">{{ number_format($vehicule->tarif_location, 2) }} franc CFA/jour</h3>
                <p class="vehicule-details">
                    <span class="detail-title">Année :</span> <span class="detail-value">{{ $vehicule->année }}</span><br>
                    <span class="detail-title">Numéro d'immatriculation :</span> <span class="detail-value">{{ $vehicule->numéro_immatriculation }}</span><br>
                    <span class="detail-title">Statut :</span>
                    <span class="detail-value">
                        @if($vehicule->statut_disponibilité === 1)
                            <span class="badge bg-success">Disponible</span>
                        @else
                            <span class="badge bg-danger">Indisponible</span>
                        @endif
                    </span>
                </p>
                <div class="d-flex gap-3">
                    @if($vehicule->statut_disponibilité === 1)
                        <a href="{{ route('reservation', ['vehicule' => $vehicule->id]) }}" class="btn btn-primary">Réservez</a>
                    @endif
                    <a href="{{ route('home') }}" class="btn btn-secondary">Retour</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('styles')
<style>
    .section__vehicle_details {
        padding: 60px 0;
        background-color: #f8f9fa;
    }

    .vehicule-img {
        height: 400px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .vehicule-title {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: #333;
    }

    .vehicule-description {
        font-size: 1.2rem;
        margin-bottom: 1rem;
        color: #555;
    }

    .vehicule-details {
        font-size: 1.1rem;
        margin-bottom: 1.5rem;
        color: #333;
        text-align: right;
    }

    .detail-title {
        color: #007bff;
        font-weight: bold;
    }

    .detail-value {
        color: #555;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        color: white;
        padding: 12px 20px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 1rem;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        color: white;
        padding: 12px 20px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 1rem;
        transition: background-color 0.3s;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .carousel-inner .carousel-item {
        height: 400px;
    }

    .carousel-item img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }

    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        padding: 10px;
    }

    @media (max-width: 767.98px) {
        .vehicule-img {
            height: 250px;
        }

        .carousel-inner .carousel-item {
            height: 250px;
        }

        .vehicule-details {
            text-align: left;
        }
    }
</style>
@endsection
