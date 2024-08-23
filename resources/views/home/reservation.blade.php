@extends('base')

@section('title', 'Réservation')

@section('content')
<div class="container mt-5 p-5 bg-light rounded shadow-sm">
    <h2 class="text-center mb-4 text-uppercase" style="color: #090a0a;">
        {{-- phrase pour la sélection de réservation --}}
        <strong>Véhicule :</strong> {{ $vehicule->marque }} {{ $vehicule->modele }}<br>
        <strong>Tarif Location :</strong> <span class="text-success">{{ number_format($vehicule->tarif_location, 2) }}f /Jour</span>
    </h2>
    
    <div class="text-center mb-4 text-uppercase font-weight-bold h4" style="color: #030000;">Sélectionnez une durée</div>
    
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
    
    <form id="reservationForm" method="POST" action="{{ route('reservations.store') }}" class="bg-white p-4 rounded">
        @csrf
        
        <input type="hidden" name="vehicule_id" value="{{ $vehicule->id }}">
        
        <div class="form-group mb-4">
            <label for="date_debut" class="form-label">Date de début</label>
            <input type="date" id="date_debut" name="date_debut" class="form-control" style="border-color: #007bff;" required>
        </div>
        
        <div class="form-group mb-4">
            <label for="date_fin" class="form-label">Date de fin</label>
            <input type="date" id="date_fin" name="date_fin" class="form-control" style="border-color: #007bff;" required>
        </div>
        
        <div id="costSection" class="d-none text-center mt-4">
            <h3 class="mb-4"><strong>Coût Total :</strong> <span id="totalCost" class="text-primary" style="color: #ffc107;"></span> franc CFA</h3>
            <div class="d-flex justify-content-center gap-3">
                <button type="submit" class="btn btn-success px-4 py-2">Confirmer</button>
                <a class="btn btn-info px-4 py-2 " href="{{ route('home') }}">Annuler</a>
            </div>
        </div>
    </form>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
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

            console.log('Date Début:', dateDebut);
            console.log('Date Fin:', dateFin);

            if (dateDebut && dateFin && dateDebut < dateFin) {
                const diffTime = Math.abs(dateFin - dateDebut);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

                const vehicleRate = parseFloat('{{ $vehicule->tarif_location }}');
                const totalCost = diffDays * vehicleRate;

                console.log('Total Cost:', totalCost);

                fetch(`{{ route('check-availability') }}?vehicule_id=${vehiculeId}&date_debut=${dateDebutInput.value}&date_fin=${dateFinInput.value}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log('API Response:', data);

                        if (data.available) {
                            totalCostElement.textContent = totalCost.toFixed(2);
                            costSection.innerHTML = `
                                <h3 class="mb-4"><strong>Coût Total :</strong> <span id="totalCost" class="text-primary" style="color: #ffc107;">${totalCost.toFixed(2)}</span> franc CFA </h3>
                                <div class="d-flex justify-content-center gap-3">
                                    <button type="submit" class="btn btn-success px-4 py-2">Confirmer</button>
                                    <a class="btn btn-info px-4 py-2" href="{{ route('home') }}">Annuler</a>
                                </div>
                            `;
                            costSection.classList.remove('d-none');
                        } else {
                            totalCostElement.textContent = '';
                            costSection.innerHTML = `
                                <div class="alert alert-danger text-center">
                                    Le véhicule n'est pas disponible pour cette période.
                                </div>
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-info px-4 py-2" href="{{ route('home') }}">Retour à l'accueil</a>
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
