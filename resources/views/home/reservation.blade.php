@extends('base')

@section('title', 'Réservation')

@section('content')
    <section class="section__reservation section-all-padding">
        <div class="container">
            <div class="section__title">
                <h1>Réservation de Véhicule</h1>
                <p>Réservez votre véhicule en sélectionnant la durée de location souhaitée.</p>
            </div>

            <div class="reservation-card">
                <div class="reservation-card__preview">
                    <img src="{{ asset('storage/' . $vehicule->image) }}"
                        alt="{{ $vehicule->marque }} {{ $vehicule->modele }}">
                </div>
                <div class="reservation-card__info">
                    <h3 class="reservation-card__title">{{ $vehicule->marque }} {{ $vehicule->modele }}</h3>
                    <p class="reservation-card__details">
                        <span>Année : {{ $vehicule->année }}</span>
                        <span>Tarif : {{ number_format($vehicule->tarif_location, 2) }}f / jour</span>
                    </p>

                    <div class="reservation-form">
                        {{-- Affichage des erreurs --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form id="reservationForm" method="POST" action="{{ route('reservations.store') }}"
                            class="bg-white p-4 rounded shadow">
                            @csrf

                            <input type="hidden" name="vehicule_id" value="{{ $vehicule->id }}">

                            <div class="form-group mb-4">
                                <label for="date_debut" class="form-label">Date de début</label>
                                <input type="date" id="date_debut" name="date_debut" class="form-control form-control-lg"
                                    required>
                            </div>

                            <div class="form-group mb-4">
                                <label for="date_fin" class="form-label">Date de fin</label>
                                <input type="date" id="date_fin" name="date_fin" class="form-control form-control-lg"
                                    required>
                            </div>

                            <div id="costSection" class="d-none text-center mt-4">
                                <h3 class="mb-4"><strong>Coût Total :</strong> <span id="totalCost"
                                        class="text-warning"></span> franc CFA</h3>
                                <div class="d-flex justify-content-center gap-3">
                                    <button type="submit" class="btn btn-success btn-lg px-4 py-2">Confirmer</button>
                                    <a class="btn btn-secondary btn-lg px-4 py-2" href="{{ route('home') }}">Annuler</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .section__reservation {
            padding: 60px 0;
        }

        .section__title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section__title h1 {
            font-size: 36px;
            color: #333;
        }

        .section__title p {
            font-size: 16px;
            color: #777;
        }

        .reservation-card {
            display: flex;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .reservation-card:hover {
            transform: translateY(-10px);
        }

        .reservation-card__preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .reservation-card__info {
            padding: 20px;
            flex-grow: 1;
        }

        .reservation-card__title {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
        }

        .reservation-card__details span {
            display: block;
            color: #555;
            margin-bottom: 5px;
        }

        .reservation-form {
            margin-top: 20px;
        }

        .reservation-form .form-control-lg {
            padding: 10px 15px;
            border-radius: 5px;
            border: 1px solid #28a745;
            font-size: 18px;
        }

        .reservation-form .btn-lg {
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
        }

        #costSection .text-warning {
            font-size: 24px;
            font-weight: bold;
        }

        .alert {
            font-size: 16px;
            color: #d9534f;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dateDebutInput = document.getElementById('date_debut');
            const dateFinInput = document.getElementById('date_fin');
            const costSection = document.getElementById('costSection');
            const totalCostElement = document.getElementById('totalCost');
            const vehiculeId = '{{ $vehicule->id }}';

            dateDebutInput.addEventListener('change', calculateCost);
            dateFinInput.addEventListener('change', calculateCost);

            function calculateCost() {
                const dateDebut = new Date(dateDebutInput.value);
                const dateFin = new Date(dateFinInput.value);

                if (dateDebut && dateFin && dateDebut < dateFin) {
                    const diffTime = Math.abs(dateFin - dateDebut);
                    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                    const vehiculeRate = parseFloat('{{ $vehicule->tarif_location }}');
                    const totalCost = diffDays * vehiculeRate;

                    fetch(
                            `{{ route('check-availability') }}?vehicule_id=${vehiculeId}&date_debut=${dateDebutInput.value}&date_fin=${dateFinInput.value}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.available) {
                                totalCostElement.textContent = totalCost.toFixed(2);
                                costSection.classList.remove('d-none');
                            } else {
                                totalCostElement.textContent = '';
                                costSection.innerHTML = `
                            <div class="alert alert-danger text-center">
                                Le véhicule n'est pas disponible pour cette période. Il sera disponible à partir du <strong>${data.next_available}</strong>.
                            </div>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-secondary btn-lg px-4 py-2" href="{{ route('home') }}">Retour à l'accueil</a>
                            </div>
                        `;
                                costSection.classList.remove('d-none');
                            }
                        })
                        .catch(error => console.error('Erreur:', error));
                } else {
                    costSection.classList.add('d-none');
                }
            }
        });
    </script>
@endsection
