<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapteurDonnee extends Model
{
    protected $fillable = ['capteur_id', 'valeur', 'created_at'];
    public $timestamps = false;

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function capteur() {
        return $this->belongsTo(Capteur::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
