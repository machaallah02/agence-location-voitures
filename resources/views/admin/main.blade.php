<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tableau de bord</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Accueil</a></li>
                <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <div class="col-lg-8">
                <div class="row">

                    <!-- Vehicles Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card vehicles-card">
                            <div class="filter">
                                <!-- Filter dropdown -->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Véhicules <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri ri-car-line"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalVehicles }}</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span>
                                        <span class="text-muted small pt-2 ps-1">augmentation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Vehicles Card -->

                    <!-- Users Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card users-card">
                            <div class="filter">
                                <!-- Filter dropdown -->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Utilisateurs <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalUsers }}</h6>
                                        <span class="text-success small pt-1 fw-bold">5%</span>
                                        <span class="text-muted small pt-2 ps-1">augmentation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Users Card -->

                    <!-- Reservations Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card reservations-card">
                            <div class="filter">
                                <!-- Filter dropdown -->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Réservations <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-calendar-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalReservations }}</h6>
                                        <span class="text-danger small pt-1 fw-bold">3%</span>
                                        <span class="text-muted small pt-2 ps-1">baisse</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Reservations Card -->

                    <!-- Maintenance Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card maintenance-card">
                            <div class="filter">
                                <!-- Filter dropdown -->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Maintenance <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-tools"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalMaintenances }}</h6>
                                        <span class="text-success small pt-1 fw-bold">2%</span>
                                        <span class="text-muted small pt-2 ps-1">augmentation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Maintenance Card -->

                    <!-- Payments Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card payments-card">
                            <div class="filter">
                                <!-- Filter dropdown -->
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Paiements <span>| Total</span></h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cash"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $totalPayments }}OXF</h6>
                                        <span class="text-success small pt-1 fw-bold">10%</span>
                                        <span class="text-muted small pt-2 ps-1">augmentation</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Payments Card -->

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Recent Activity -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Activité Récente</h5>
                        <div class="activity">
                            @foreach ($recentActivities as $activity)
                                <div class="activity-item d-flex">
                                    <div class="activite-label">
                                        {{ $activity['created_at']->diffForHumans() }}
                                    </div>
                                    <i class="bi bi-circle-fill activity-badge
                                        @if ($activity['type'] === 'reservation') text-success
                                        @elseif($activity['type'] === 'update') text-danger
                                        @elseif($activity['type'] === 'payment') text-warning
                                        @endif
                                        align-self-start"></i>
                                    <div class="activity-content">
                                        <a href="#" class="fw-bold text-dark">{{ $activity['user']->nom }}</a>
                                        {{ $activity['message'] }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- End Recent Activity -->

                <!-- Reservations Graph -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Réservations par Mois</h5>
                        <canvas id="reservationsChart"></canvas>
                    </div>
                </div><!-- End Reservations Graph -->

            </div><!-- End Right side columns -->

        </div><!-- End Row -->

        <div class="row mt-4">
            <!-- Vehicles Table -->
            <div class="col-lg-6">
                <div class="card bg-light border">
                    <div class="card-body border">
                        <h5 class="card-title">Voitures Récentes</h5>
                        <table class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Marque</th>
                                    <th>Modèle</th>
                                    <th>Année</th>
                                    <th>Tarif</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentVehicles as $vehicle)
                                    <tr>
                                        <td>{{ $vehicle->id }}</td>
                                        <td>{{ $vehicle->marque }}</td>
                                        <td>{{ $vehicle->modele }}</td>
                                        <td>{{ $vehicle->année }}</td>
                                        <td>{{ $vehicle->tarif_location }} <strong class="text-danger">OXF</strong></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- End Vehicles Table -->

            <!-- Users Table -->
            <div class="col-lg-6">
                <div class="card bg-light border">
                    <div class="card-body border">
                        <h5 class="card-title">Utilisateurs Récent</h5>
                        <table class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Rôle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentUsers as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->nom }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- End Users Table -->

        </div><!-- End Row -->
    </section>

</main><!-- End #main -->

<style>

    /* Vehicles Card */
.vehicles-card {
    background-color: #eafaf1;
}

.vehicles-card .card-icon {
    background-color: #28a745;
}

/* Users Card */
.users-card {
    background-color: #f0f4f7;
}

.users-card .card-icon {
    background-color: #007bff;
}

/* Reservations Card */
.reservations-card {
    background-color: #fff3e0;
}

.reservations-card .card-icon {
    background-color: #fd7e14;
}

/* Maintenance Card */
.maintenance-card {
    background-color: #e6f5f1;
}

.maintenance-card .card-icon {
    background-color: #17a2b8;
}

/* Payments Card */
.payments-card {
    background-color: #f8f9fa;
}

.payments-card .card-icon {
    background-color: #6c757d;
}

</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('reservationsChart').getContext('2d');
var reservationsChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Réservations',
            data: @json(array_values($reservationsByMonth)),
            borderColor: 'rgba(54, 162, 235, 1)', // Bleu clair
            backgroundColor: 'rgba(54, 162, 235, 0.2)', // Bleu clair transparent
            fill: false,
        }]
    },
    options: {
        scales: {
            x: {
                beginAtZero: true
            },
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>
