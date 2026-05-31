<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckChefSite
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role !== 'chefSite' && auth()->user()->role !== 'admin') {
            abort(403, 'Accès réservé aux Chef de Site');
        }

        return $next($request);
    }
}
