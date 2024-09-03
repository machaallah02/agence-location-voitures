<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('modele');
            $table->year('année');
            $table->string('couleur');
            $table->enum('carburant', ['essence', 'diesel', 'électrique', 'hybride']);
            $table->enum('type', ['4x4', 'petit', 'grand']);
            $table->string('puissance');
            $table->string('vitesse_max');
            $table->enum('controle', ['manuel', 'auto']);
            $table->string('numéro_immatriculation')->unique();
            $table->boolean('statut_disponibilité')->default(true);
            $table->decimal('tarif_location', 10, 2);
            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
};
