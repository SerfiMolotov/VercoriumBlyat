<?php

namespace App\Http\Controllers\Technicien;

use App\Http\Controllers\Controller;
use App\Models\Site;

class TechnicienSiteController extends Controller
{
    public function index()
    {
        $sites = Site::orderBy('nom')->get();

        return view('technicien.sites.index', compact('sites'));
    }
}
