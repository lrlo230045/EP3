<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Debes iniciar sesión');
        }
        if (Auth::check() && Auth::user()->tipo === 'admin') {
            return $next($request);
        }

        return redirect('/usuarios')->with('error', 'No tienes permisos');
    }
}
