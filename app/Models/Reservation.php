<?php

namespace App\Models;

use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'vehicule_id',
        'date_debut',
        'date_fin',
        'coût_total',
        'statut',

    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }
}
