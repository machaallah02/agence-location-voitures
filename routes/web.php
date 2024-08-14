<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VehiculeController;
use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Admin\ReservationController;

// Route accessible pour tous
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/payment/process/{reservation}', [PaymentController::class, 'process'])->name('payment.process');
Route::get('/profil/{id}', [ProfileController::class, 'show'])->name('profile')->middleware(['auth']);



// Route accessible pour les clients connectés uniquement
Route::middleware(['auth', 'client'])->group(function () {  
Route::get('/reservation/{vehicule}', [ClientController::class, 'showReservationForm'])->name('reservation');
Route::post('/reservation', [ClientController::class, 'store'])->name('reservations.store');
Route::get('/historique', [ClientController::class, 'historique'])->name('historique');

});

// Routes pour la connexion et l'inscription
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');

// Route pour la deconnexion
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes administratives protégées
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::resource('users', UserController::class)->only(['index', 'create', 'store']);
        Route::get('/users/{user:id}/show', 'show')->name('users.show');
        Route::get('/users/{user:id}', 'edit')->name('users.edit');
        Route::put('/users/{user:id}', 'update')->name('users.update');
        Route::delete('/users/{user:id}', 'destroy')->name('users.destroy');
    });
    Route::controller(VehiculeController::class)->group(function () {
        Route::resource('vehicules', VehiculeController::class)->only(['index', 'create', 'store']);
        Route::get('/vehicules/{vehicule:id}/show', 'show')->name('vehicules.show');
        Route::get('/vehicules/{vehicule:id}', 'edit')->name('vehicules.edit');
        Route::put('/vehicules/{vehicule:id}', 'update')->name('vehicules.update');
        Route::delete('/vehicules/{vehicule:id}', 'destroy')->name('vehicules.destroy');
    });
    Route::controller(ReservationController::class)->group(function () {
        Route::resource('reservations', ReservationController::class)->only(['index', 'create', 'store']);
        Route::get('/reservations/{reservation:id}/show', 'show')->name('reservations.show');
        Route::get('/reservations/{reservation:id}', 'edit')->name('reservations.edit');
        Route::put('/reservations/{reservation:id}', 'update')->name('reservations.update');
        Route::delete('/reservations/{reservation:id}', 'destroy')->name('reservations.destroy');
    });
    Route::controller(MaintenanceController::class)->group(function () {
        Route::resource('maintenances', MaintenanceController::class)->only(['index', 'create', 'store']);
        Route::get('/maintenances/{maintenance:id}/show', 'show')->name('maintenances.show');
        Route::get('/maintenances/{maintenance:id}', 'edit')->name('maintenances.edit');
        Route::put('/maintenances/{maintenance:id}', 'update')->name('maintenances.update');
        Route::delete('/maintenances/{maintenance:id}', 'destroy')->name('maintenances.destroy');
    });

    Route::get('/index', [AdminController::class, 'dashboard'])->name('index');
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
});

Route::get('/vehicules/search', [VehiculeController::class, 'search'])->name('vehicules.search');


// Route pour créer un admin (potentiellement pour des tests)
Route::get('/createAdmin', [AuthController::class, 'createAdmin']);
