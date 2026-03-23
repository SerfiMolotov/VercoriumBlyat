<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class CheckLogistique
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role !== 'logistique' && auth()->user()->role !== 'admin') {
            abort(403, 'Accès réservé aux logisticiens');
        }

        return $next($request);
    }
}
