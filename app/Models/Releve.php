<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Releve extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_releve',
        'user_id',
        'site_id',
        'profondeur',
        'meteo',
        'type_intervention',
        'duree_intervention',
        'etat_structure',
        'perimetre_securise',
        'fuites_visibles',
        'statut_production',
        'niveau_stockage_general',
        'photo_url',
        'signature_technicien',
        'observations',
        'anomalies',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
