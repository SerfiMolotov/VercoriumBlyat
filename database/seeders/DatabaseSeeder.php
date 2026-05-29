<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Site;
use App\Models\Capteur;
use App\Models\Releve;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $admin = User::create([
            'name' => 'Admin Vercorium',
            'email' => 'admin@vercorium.fr',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $technicien = User::create([
            'name' => 'Baptiste',
            'email' => 'technicien@vercorium.fr',
            'password' => Hash::make('password'),
            'role' => 'technicien',
        ]);

        $site1 = Site::create([
            'nom' => 'Site Alpha - Forage Nord',
            'ville' => 'Valence',
            'code_postal' => '26000',
            'adresse' => 'Zone Industrielle Plateau',
            'type' => 'extraction',
            'description' => 'Site principal d\'extraction souterraine.',
        ]);

        $site2 = Site::create([
            'nom' => 'Site Beta - Traitement',
            'ville' => 'Livron-sur-Drôme',
            'code_postal' => '26250',
            'adresse' => 'Bord de rivière',
            'type' => 'traitement',
            'description' => 'Station de filtrage et de traitement des boues.',
        ]);

        Capteur::create([
            'site_id' => $site1->id,
            'nom' => 'Sonde Pression A1',
            'type' => 'Pression',
            'unite_mesure' => 'bar',
            'statut' => 'actif',
        ]);

        Releve::create([
            'date_releve' => now()->subDays(2),
            'user_id' => $technicien->id,
            'site_id' => $site1->id,
            'profondeur' => 145.50,
            'meteo' => 'pluie',
            'type_intervention' => 'routine',
            'duree_intervention' => 45,
            'etat_structure' => 'bon',
            'perimetre_securise' => true,
            'fuites_visibles' => false,
            'statut_production' => 'normale',
            'niveau_stockage_general' => 85,
            'signature_technicien' => true,

            'observations' => 'Contrôle de routine OK. Légère infiltration d\'eau de pluie près du capteur mais rien de critique.',
            'anomalies' => false,
        ]);

        Releve::create([
            'date_releve' => now()->subHours(5),
            'user_id' => $technicien->id,
            'site_id' => $site2->id,
            'profondeur' => 12.00,
            'meteo' => 'vent_fort',
            'type_intervention' => 'depannage',
            'duree_intervention' => 120,
            'etat_structure' => 'degrade',
            'perimetre_securise' => false,
            'fuites_visibles' => true,
            'statut_production' => 'arret',
            'niveau_stockage_general' => 15,
            'signature_technicien' => true,

            'observations' => 'Alerte fuite sur la cuve principale. Le vent fort a abîmé la clôture ouest. Arrêt immédiat de la production demandé.',
            'anomalies' => true,
        ]);
    }
}
