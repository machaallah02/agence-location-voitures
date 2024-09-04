<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vehicule;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaintenanceController extends Controller
{
    public function index()
    {
        // Récupérer toutes les maintenances avec le véhicule associé
        $maintenances = Maintenance::with('vehicule')->get();

        // Retourner la vue avec les données
        return view('admin.maintenances.index', compact('maintenances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Récupérer tous les véhicules pour le dropdown
        $vehicules = Vehicule::all();

        // Retourner la vue avec les données
        return view('admin.maintenances.create', compact('vehicules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valider les données envoyées
        $validatedData = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'date_maintenance' => 'required|date',
            'description' => 'nullable|string',
            'statut' => 'required|in:planifiée,en cours,complétée',
        ]);

        // Créer une nouvelle entrée de maintenance
        Maintenance::create($validatedData);

        // Rediriger avec un message de succès
        return redirect()->route('admin.maintenances.index')->with('success', 'Maintenance planifiée avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Maintenance $maintenance)
    {
        // Récupérer tous les véhicules pour le dropdown
        $vehicules = Vehicule::all();

        // Retourner la vue avec les données
        return view('admin.maintenances.edit', compact('maintenance', 'vehicules'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Maintenance $maintenance)
    {
       try {
        $validatedData = $request->validate([
            'vehicule_id' => 'required|exists:vehicules,id',
            'date_maintenance' => 'required|date',
            'description' => 'nullable|string',
            'statut' => 'required|in:planifiée,en cours,complétée',
        ]);

        $maintenance->update($validatedData);

        return redirect()->route('admin.maintenances.index')->with('success', 'Maintenance mise à jour avec succès.');
       } catch (\Exception $e) {

        return redirect()->route('admin.maintenances.index')->with('error', $e->getMessage());
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        // Supprimer l'entrée de maintenance
        $maintenance->delete();

        // Rediriger avec un message de succès
        return redirect()->route('admin.maintenances.index')->with('success', 'Maintenance supprimée avec succès.');
    }
}
