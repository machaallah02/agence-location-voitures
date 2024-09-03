<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_maintenance',
        'vehicule_id',
        'description',
        'status',
    ];

    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class);
    }
}
