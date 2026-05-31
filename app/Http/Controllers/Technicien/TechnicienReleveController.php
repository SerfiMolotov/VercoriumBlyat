<?php

namespace App\Http\Controllers\Technicien;

use App\Http\Controllers\Controller;
use App\Models\Releve;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TechnicienReleveController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user->isTechnicien() && !$user->isAdmin() && !$user->isChefSite() && !$user->isLogistique()) {
            abort(403, 'Accès refusé : Vous n\'avez pas les droits pour consulter les relevés.');
        }

        $releves = Releve::with(['site', 'user'])->orderBy('date_releve', 'desc')->paginate(5);

        return view('technicien.releves.index', compact('releves'));
    }

    public function destroy(Releve $releve)
    {
        if (!Auth::user()->isAdmin()) {
            abort(403, 'Action non autorisée : Seuls les administrateurs peuvent supprimer un rapport.');
        }

        $releve->delete();

        return redirect()->route('technicien.releves')->with('success', 'Le rapport d\'intervention a été supprimé définitivement.');
    }

    public function create()
    {
        $user = Auth::user();

        if (!$user->isTechnicien() && !$user->isAdmin()) {
            abort(403, 'Seuls les techniciens peuvent saisir un nouveau rapport.');
        }

        $sites = Site::all();
        return view('technicien.releves.create', compact('sites'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_releve' => 'required|date',
            'site_id' => 'required|exists:sites,id',
            'profondeur' => 'required|numeric|min:0',
            'observations' => 'nullable|string',
            'meteo' => 'nullable|in:ensoleille,pluie,neige,vent_fort,autre',
            'type_intervention' => 'required|in:routine,depannage,installation',
            'duree_intervention' => 'nullable|integer|min:0',
            'etat_structure' => 'required|in:bon,degrade,critique',
            'statut_production' => 'required|in:normale,arret,degrade',
            'niveau_stockage_general' => 'nullable|integer|min:0|max:100',
        ]);

        Releve::create([
            'date_releve' => $request->date_releve,
            'user_id' => Auth::id(),
            'site_id' => $request->site_id,
            'profondeur' => $request->profondeur,
            'observations' => $request->observations,
            'anomalies' => $request->has('anomalies'),
            'meteo' => $request->meteo,
            'type_intervention' => $request->type_intervention,
            'duree_intervention' => $request->duree_intervention,
            'etat_structure' => $request->etat_structure,
            'statut_production' => $request->statut_production,
            'niveau_stockage_general' => $request->niveau_stockage_general,

            'perimetre_securise' => $request->has('perimetre_securise'),
            'fuites_visibles' => $request->has('fuites_visibles'),
            'signature_technicien' => $request->has('signature_technicien'),
        ]);

        return redirect()->route('technicien.releves')->with('success', 'Relevé de forage ajouté avec succès !');
    }
}
