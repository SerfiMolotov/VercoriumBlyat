<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }
}
