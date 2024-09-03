<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Vehicule;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Méthode pour la page d'accueil générale
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('home/index1', compact('vehicules'));
    }

    // Méthode pour la page d'accueil des clients connectés
    public function clientHome()
    {
        $vehicules = Vehicule::all();
       return view('home/clientHome', compact('vehicules'));
    }

    // Méthode pour la page de réservation
    public function reservations()
    {
        return Inertia::render('frontend/Reservations');
    }

    // Méthode pour la page de contact
    public function contact()
    {
        return Inertia::render('frontend/Contact');
    }

    // Méthode pour la page d'inscription
    public function register()
    {
        return Inertia::render('frontend/Register');
    }

}
