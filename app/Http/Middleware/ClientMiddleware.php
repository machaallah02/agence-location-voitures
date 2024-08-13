<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Vérifiez si l'utilisateur a le rôle 'client'
        if (Auth::check() && Auth::user()->role === 'client') {
            return $next($request);
        }

        // Redirection ou message d'erreur si l'utilisateur n'est pas autorisé
        return redirect('/home')->with('error', 'Vous n\'avez pas accès à cette ressource.');
    }
}
