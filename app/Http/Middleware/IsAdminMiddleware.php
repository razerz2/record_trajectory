<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Verificar se o usuário está autenticado e é um administrador
        if (Auth::check() && Auth::user()->isAdmin) {

            return $next($request);

        }
        // Redirecionar ou retornar um erro, dependendo da sua necessidade
        return redirect()->route('colaboradores.dashboard')->with('error', 'acesso não autorizado! Somente para administradores...');
    }
}
