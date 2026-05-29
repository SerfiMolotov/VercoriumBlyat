<?php

namespace App\Http\Controllers\Technicien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Releve;

class TechnicienDashboardController extends Controller
{
    public function index()
    {
        $derniersReleves = Releve::with('site')->latest()->take(5)->get();

        return view('technicien.dashboard', compact('derniersReleves'));
    }
}

