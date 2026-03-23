<?php

namespace App\Http\Controllers\Technicien;

use App\Http\Controllers\Controller;

class TechnicienDashboardController extends Controller
{
    public function index()
    {
        return view('technicien.dashboard');
    }
}

