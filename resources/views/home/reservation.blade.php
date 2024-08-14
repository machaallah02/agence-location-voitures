@extends('base')

@section('title', 'Réservation')
@section('content')
<div class="container">
    <h2>Réserver un Véhicule</h2>
    {{-- error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form id="reservationForm" method="POST" action="{{ route('reservations.store') }}">
        @csrf
        
        <input type="hidden" name="vehicule_id" value="{{ $vehicule->id }}">
        
        <div class="form-group">
            <label for="date_debut">Date de début</label>
            <input type="date" id="date_debut" name="date_debut" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="date_fin">Date de fin</label>
            <input type="date" id="date_fin" name="date_fin" class="form-control" required>
        </div>
        
        <div id="costSection" class="d-none">
            <h3>Coût Total : <span id="totalCost"></span> €</h3>
            <button type="submit" class="btn btn-primary">Confirmer</button>
            <button  class="btn btn-secondary" href="{{ route('home') }}">Annuler</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const dateDebutInput = document.getElementById('date_debut');
        const dateFinInput = document.getElementById('date_fin');
        const costSection = document.getElementById('costSection');
        const totalCostElement = document.getElementById('totalCost');
        
        dateDebutInput.addEventListener('change', calculateCost);
        dateFinInput.addEventListener('change', calculateCost);
        
        function calculateCost() {
            const dateDebut = new Date(dateDebutInput.value);
            const dateFin = new Date(dateFinInput.value);
            
            if (dateDebut && dateFin && dateDebut < dateFin) {
                const diffTime = Math.abs(dateFin - dateDebut);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                
                // Suppose the vehicle rate is stored in a JS variable or fetched from a data attribute
                const vehicleRate = parseFloat('{{ $vehicule->tarif_location }}'); // Example

                const totalCost = diffDays * vehicleRate;
                totalCostElement.textContent = totalCost.toFixed(2);
                costSection.classList.remove('d-none');
            } else {
                costSection.classList.add('d-none');
            }
        }
    });
</script>
@endsection