<main id="main" class="main">

    <div class="pagetitle">
        <h1>Espace Client</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('personnel.index') }}">Accueil</a></li>
                <li class="breadcrumb-item active">Tableau de Bord</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Reservations Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Vos Réservations <span>| Aujourd'hui</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-car-front"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $reservationsToday }}</h6>
                                        <span class="text-success small pt-1 fw-bold">{{ $reservationsToday }} nouvelles</span>
                                        <span class="text-muted small pt-2 ps-1">aujourd'hui</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Reservations Card -->

                    <!-- Total Spending Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Dépenses Totales <span>| Ce mois-ci</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-wallet2"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>${{ number_format($totalSpendingThisMonth, 2) }}</h6>
                                        <span class="text-success small pt-1 fw-bold">+15%</span>
                                        <span class="text-muted small pt-2 ps-1">par rapport au mois dernier</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Total Spending Card -->

                    <!-- Suggested Vehicles Card -->
                    <div class="col-xxl-4 col-xl-12">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Véhicules Suggérés <span>| Basé sur votre historique</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ count($suggestedVehicles) }} options</h6>
                                        <span class="text-muted small pt-2 ps-1">basées sur votre historique</span>
                                    </div>
                                </div>
                                <ul>
                                    @foreach($suggestedVehicles as $vehicle)
                                        <li>{{ $vehicle->marque }} {{ $vehicle->modele }} - {{ $vehicle->carburant }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div><!-- End Suggested Vehicles Card -->

                </div>
            </div><!-- End Left side columns -->
        </div>
    </section>

</main><!-- End #main -->
