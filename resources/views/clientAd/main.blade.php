<main id="main" class="main">

    <div class="pagetitle">
        <h1>Espace Client</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Accueil</a></li>
                <li class="breadcrumb-item active">Tableau de Bord</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
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

                    <!-- Reservations Chart Card -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <h5 class="card-title">Statistiques de Réservation <span>| Ce mois-ci</span></h5>
                                <div id="reservationChart" style="min-height: 300px;">
                                    <!-- Placeholder for the chart -->
                                </div>
                                <script>
                                    var options = {
                                        series: [{
                                            name: 'Réservations',
                                            data: [
                                                @for($i = 1; $i <= 7; $i++)
                                                    {{ $reservationStats[$i] ?? 0 }},
                                                @endfor
                                            ]
                                        }],
                                        chart: {
                                            height: 300,
                                            type: 'line',
                                            zoom: {
                                                enabled: false
                                            }
                                        },
                                        dataLabels: {
                                            enabled: false
                                        },
                                        stroke: {
                                            curve: 'smooth'
                                        },
                                        title: {
                                            text: 'Tendances des Réservations',
                                            align: 'left'
                                        },
                                        grid: {
                                            row: {
                                                colors: ['#f3f3f3', 'transparent'],
                                                opacity: 0.5
                                            },
                                        },
                                        xaxis: {
                                            categories: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                                        }
                                    };
                                    var chart = new ApexCharts(document.querySelector("#reservationChart"), options);
                                    chart.render();
                                </script>
                            </div>
                        </div>
                    </div><!-- End Reservations Chart Card -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Suggestions Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Suggestions pour Vous</h5>
                        <div class="suggestions">
                            <ul>
                                <li>Réservez un SUV pour vos prochaines vacances</li>
                                <li>Explorez nos offres pour la rentrée</li>
                                <li>Essayez nos véhicules électriques dernier cri</li>
                            </ul>
                        </div>
                    </div>
                </div><!-- End Suggestions Card -->

                <!-- Feedback Card -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Donnez Votre Avis</h5>
                        <div class="feedback-form">
                            <label for="rating">Évaluation</label>
                            <input type="range" id="rating" name="rating" min="1" max="5">
                            <textarea class="form-control mt-3" rows="3" placeholder="Votre commentaire..."></textarea>
                            <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
                        </div>
                    </div>
                </div><!-- End Feedback Card -->

            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->
