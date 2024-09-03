<?php

namespace App\Http\Controllers\Admin;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\VehiculeRequest;
use App\Http\Requests\Admin\VehiculeUpdateRequest;

class VehiculeController extends Controller
{
    // Afficher la liste des véhicules
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('admin.vehicules.index', [
            'vehicules' => $vehicules,
        ]);
    }

    // Afficher le formulaire pour créer un nouveau véhicule
    public function create()
    {
        return view('admin.vehicules.create');
    }

    // Enregistrer un nouveau véhicule
    public function store(VehiculeRequest $request)
    {
        // Sauvegarder l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('vehicules', 'public');
        } else {
            return back()->with('error', 'Le fichier image est manquant.');
        }

        Vehicule::create([
            'marque' => $request->marque,
            'modele' => $request->modele,
            'année' => $request->année,
            'couleur' => $request->couleur,
            'type' => $request->type,
            'carburant' => $request->carburant,
            'puissance' => $request->puissance,
            'controle'=>$request->controle,
            'vitesse_max' => $request->vitesse_max,
            'numéro_immatriculation' => $request->numéro_immatriculation,
            'statut_disponibilité' => $request->statut_disponibilité,
            'tarif_location' => $request->tarif_location,
            'image' => $imagePath
        ]);

        return redirect()->route('admin.vehicules.index')->with('success', 'Véhicule créé avec succès.');
    }

    // Afficher les détails d'un véhicule
    public function show(Vehicule $vehicule)
    {
        return view('admin.vehicules.show', [
            'vehicule' => $vehicule,
        ]);
    }

    // Afficher le formulaire pour éditer un véhicule
    public function edit(Vehicule $vehicule)
    {
        return view('admin.vehicules.edit', [
            'vehicule' => $vehicule,
        ]);
    }

    // Mettre à jour les informations d'un véhicule
    public function update(VehiculeUpdateRequest $request, Vehicule $vehicule)
    {
        try {
            // Gestion de l'image
            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image si elle existe
                if ($vehicule->image && Storage::disk('public')->exists($vehicule->image)) {
                    Storage::disk('public')->delete($vehicule->image);
                }

                // Enregistrer la nouvelle image
                $imagePath = $request->file('image')->store('vehicules', 'public');
                $vehicule->image = $imagePath;
            }

            // Mise à jour des autres attributs
            $vehicule->update([
                'marque' => $request->marque,
                'modele' => $request->modele,
                'année' => $request->année,
                'couleur' => $request->couleur,
                'carburant' => $request->carburant,
                'type' => $request->type,
                'puissance' => $request->puissance,
                'vitesse_max' => $request->vitesse_max,
                'controle'=>$request->controle,
                'numéro_immatriculation' => $request->numéro_immatriculation,
                'statut_disponibilité' => $request->statut_disponibilité,
                'tarif_location' => $request->tarif_location,
                'image' => $vehicule->image // Utilise la nouvelle image si elle est définie
            ]);

            // Redirection avec message de succès
            return redirect()->route('admin.vehicules.index', $vehicule->id)
                             ->with('success', 'Véhicule mis à jour avec succès.');
        } catch (\Exception $e) {
            // Gérer les erreurs et renvoyer un message flash
            return redirect()->route('admin.vehicules.edit', $vehicule->id)
                             ->with('error', 'Une erreur est survenue lors de la mise à jour du véhicule.');
        }
    }

    // Supprimer un véhicule
    public function destroy(Vehicule $vehicule)
    {
        $vehicule->delete();
        return redirect()->route('admin.vehicules.index')->with('success', 'Véhicule supprimé avec succès.');
    }



    public function search(Request $request) {
        // Validation des entrées
        $validated = $request->validate([
            'marque' => 'nullable|string|max:255',
            'modele' => 'nullable|string|max:255',
            'année' => 'nullable|integer|digits:4',
            'tarif_location' => 'nullable|numeric|min:0',
        ]);

        $query = Vehicule::query();

        if ($request->filled('marque')) {
            $query->where('marque', 'like', "%{$validated['marque']}%");
        }

        if ($request->filled('modele')) {
            $query->where('modele', 'like', "%{$validated['modele']}%");
        }

        if ($request->filled('année')) {
            $query->where('année', $validated['année']);
        }

        if ($request->filled('tarif_location')) {
            $query->where('tarif_location', '<=', $validated['tarif_location']);
        }

        // Pagination des résultats
        $vehicules = $query->paginate(10); // Affiche 10 véhicules par page

        return view('home.index1', compact('vehicules'));
    }


    public function showDetails($id)
    {
        $vehicule = Vehicule::findOrFail($id);
        return view('home/details', [
            'vehicule' => $vehicule,
        ]);
    }

    public function showAll()
    {
        $vehicules = Vehicule::all();
        return view('home/tout', [
            'vehicules' => $vehicules,
        ]);
    }

}
