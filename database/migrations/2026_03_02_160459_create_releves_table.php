<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('releves', function (Blueprint $table) {
            $table->id();
            $table->date('date_releve');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('site_id')->constrained('sites')->onDelete('cascade');
            $table->decimal('profondeur', 8, 2);
            $table->enum('meteo', ['ensoleille', 'pluie', 'neige', 'vent_fort', 'autre'])->nullable();
            $table->enum('type_intervention', ['routine', 'depannage', 'installation'])->default('routine');
            $table->integer('duree_intervention')->nullable();
            $table->enum('etat_structure', ['bon', 'degrade', 'critique'])->default('bon');
            $table->boolean('perimetre_securise')->default(true);
            $table->boolean('fuites_visibles')->default(false);
            $table->enum('statut_production', ['normale', 'arret', 'degrade'])->default('normale');
            $table->integer('niveau_stockage_general')->nullable(); // En pourcentage ou volume selon ton choix
            $table->string('photo_url')->nullable(); // Le chemin de l'image sur le serveur
            $table->boolean('signature_technicien')->default(false);
            $table->text('observations')->nullable();
            $table->boolean('anomalies')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('releves');
    }
};
