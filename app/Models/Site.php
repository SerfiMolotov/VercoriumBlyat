<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [
        'nom',
        'adresse',
        'ville',
        'code_postal',
        'type',
        'description',
    ];
    public function capteurs()
    {
        return $this->hasMany(Capteur::class);
    }

    public function releves()
    {
        return $this->hasMany(Releve::class);
    }
}
