<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTechnicien
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role !== 'technicien' && auth()->user()->role !== 'admin') {
            abort(403, 'Accès réservé aux techniciens');
        }

        return $next($request);
    }
}
