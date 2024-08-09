<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Inertia\Inertia;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user() && Auth::user()->role == 'admin') {
            return $next($request);
        }

        // Retourner une réponse Inertia pour l'accès non autorisé
        return Inertia::render('Error', [
            'message' => 'Accès non autorisé. Vous n\'avez pas la permission de voir cette page.'
        ]);
    }
}
