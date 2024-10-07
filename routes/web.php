<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VehiculeController;
use App\Http\Controllers\Admin\MaintenanceController;
use App\Http\Controllers\Admin\ReservationController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/reservation/{id}/pay', [PaymentController::class, 'pay'])->name('reservation.pay');
Route::get('/payment/callback/{reservationId}', [PaymentController::class, 'paymentCallback'])->name('payment.callback');
Route::get('/vehicule/{id}', [VehiculeController::class, 'showDetails'])->name('vehicule.details');
Route::get('/vehicules', [VehiculeController::class, 'showAll'])->name('vehicules');




Route::get('/payment/process/{reservation}', [PaymentController::class, 'process'])->name('payment.process');
Route::get('/profil/{id}', [ProfileController::class, 'show'])->name('profile')->middleware(['auth']);
Route::get('/profil/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profil/{id}', [ProfileController::class, 'update'])->name('profile.update');





Route::middleware(['auth', 'client'])->group(function () {
Route::get('client/profile', [ClientController::class, 'profile'])->name('profile');
Route::get('/admin/client', [ClientController::class, 'index'])->name('client.index');
Route::get('/reservation/{vehicule}', [ClientController::class, 'showReservationForm'])->name('reservation');
Route::post('/reservation', [ClientController::class, 'store'])->name('reservations.store');
Route::get('/historique', [ClientController::class, 'historique'])->name('historique');
Route::get('/check-availability', [ClientController::class, 'checkAvailability'])->name('check-availability');
Route::get('/reservations/{reservation:id}/details', [ClientController::class, 'showReservationDetails'])->name('reservations.details');
Route::put('annuler-reservation/{reservation}', [ReservationController::class, 'annuler'])->name('annuler-reservation');
});


Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin']);
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

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
    Route::resource('/maintenances', MaintenanceController::class);

    Route::get('/index', [AdminController::class, 'dashboard'])->name('index');
    Route::get('settings', [AdminController::class, 'settings'])->name('settings');
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
});

Route::middleware(['auth', 'personnel'])->prefix('personnel')->name('personnel.')->group(function () {
    Route::get('/index', [PersonnelController::class, 'index'])->name('index');
});

Route::get('/vehicules/search', [VehiculeController::class, 'search'])->name('vehicules.search');

Route::get('/createAdmin', [AuthController::class, 'createAdmin']);
