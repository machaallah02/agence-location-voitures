<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VehiculeUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'année' => 'required|integer|min:1900|max:' . date('Y'),
            'couleur' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'carburant' => 'required|string|max:255',
            'controle' => 'required|string|max:255',
            'puissance' => 'required|string|max:255',
            'vitesse_max' => 'required|string|max:255',
            'numéro_immatriculation' => 'required|string|max:255|unique:vehicules,numéro_immatriculation,' . $this->vehicule->id,
            'statut_disponibilité' => 'required|boolean',
            'tarif_location' => 'required|numeric|min:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
        ];
    }
}
