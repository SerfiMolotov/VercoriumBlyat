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
        Schema::create('capteur_donnees', function (Blueprint $table) {
            $table->id();

            $table->foreignId('capteur_id')->constrained('capteurs')->onDelete('cascade');
            $table->string('valeur');
            $table->string('unite')->nullable();
            $table->string('statut')->default('normal');

            $table->timestamp('created_at')->useCurrent();
        });
    }

    public function capteurDonnees()
    {
        return $this->hasMany(CapteurDonnee::class);
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capteur_donnees');
    }
};
