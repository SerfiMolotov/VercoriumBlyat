<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Releve;
use App\Models\Site;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    public function index()
    {
        return response()->json(Releve::all());
    }
}
