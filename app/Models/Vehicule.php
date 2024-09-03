<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $fillable=[
        'marque',
        'modele',
        'année',
        'couleur',
        'type',
        'vitesse_max',
        'puissance',
        'carburant',
        'controle',
        'numéro_immatriculation',
        'statut_disponibilité',
        'tarif_location',
        'image'
    ];
}
