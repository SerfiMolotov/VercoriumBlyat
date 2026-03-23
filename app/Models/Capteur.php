<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capteur extends Model
{
    protected $fillable = ['site_id', 'nom', 'type', 'ref_serie', 'est_actif'];

    public function site() {
        return $this->belongsTo(Site::class);
    }

    public function donnees() {
        return $this->hasMany(CapteurDonnee::class);
    }
}
