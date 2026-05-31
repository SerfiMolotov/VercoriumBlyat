<?php

namespace App\Http\Controllers\Technicien;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Support\Facades\Auth;


class TechnicienSiteController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user->isTechnicien() && !$user->isChefSite() && !$user->isAdmin()) {
            abort(403, 'Accès refusé : Vous n\'avez pas les droits pour consulter la liste des infrastructures.');
        }

        $sites = Site::orderBy('nom')->get();

        return view('technicien.sites.index', compact('sites'));
    }
}
