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

        $releves = Releve::with(['site', 'user'])->orderBy('date_releve', 'desc')->get();

        return view('technicien.releves.index', compact('releves'));
    }

    public function create()
    {
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
        ]);

        Releve::create([
            'date_releve' => $request->date_releve,
            'user_id' => Auth::id(),
            'site_id' => $request->site_id,
            'profondeur' => $request->profondeur,
            'observations' => $request->observations,
            'anomalies' => $request->has('anomalies'),
        ]);

        return redirect()->route('technicien.releves')->with('success', 'Relevé de forage ajouté avec succès !');
    }
}
