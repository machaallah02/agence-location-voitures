<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Vehicule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VehiculeRequest;
use App\Http\Requests\Admin\VehiculeUpdateRequest;

class VehiculeController extends Controller
{
    // Afficher la liste des véhicules
    public function index(): Response
    {
        $vehicules = Vehicule::all();
        return inertia
        ('admin/vehicule/index', [
            'vehicules' => $vehicules,
        ]);
    }

    // Afficher le formulaire pour créer un nouveau véhicule
    public function create(): Response
    {
        return inertia
        ('admin/vehicule/create');
    }

    // Enregistrer un nouveau véhicule
    public function store(VehiculeRequest $request)
    {
        Vehicule::create([
            'marque' => $request->marque,
            'modele' => $request->modele,
            'année' => $request->année,
            'numéro_immatriculation' => $request->numéro_immatriculation,
            'statut_disponibilité' => $request->statut_disponibilité,
            'tarif_location' => $request->tarif_location,
        ]);

        return redirect()->route('admin.vehicules.index')->with('success', 'Véhicule créé avec succès.');
    }

    // Afficher les détails d'un véhicule
    public function show(Vehicule $vehicule): Response
    {
        return inertia
        ('admin/vehicule/show', [
            'vehicule' => $vehicule,
        ]);
    }

    // Afficher le formulaire pour éditer un véhicule
    public function edit(Vehicule $vehicule): Response
    {
        return inertia
        ('admin/vehicule/edit', [
            'vehicule' => $vehicule,
        ]);
    }

    // Mettre à jour un véhicule
    public function update(VehiculeUpdateRequest $request, Vehicule $vehicule)
    {
        $vehicule->update([
            'marque' => $request->marque,
            'modele' => $request->modele,
            'année' => $request->année,
            'numéro_immatriculation' => $request->numéro_immatriculation,
            'statut_disponibilité' => $request->statut_disponibilité,
            'tarif_location' => $request->tarif_location,
        ]);

        return redirect()->route('admin.vehicules.index')->with('success', 'Véhicule mis à jour avec succès.');
    }

    // Supprimer un véhicule
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();
        return redirect()->route('admin.vehicules.index')->with('success', 'Véhicule supprimé avec succès.');
    }
}
