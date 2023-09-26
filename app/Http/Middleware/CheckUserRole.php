<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
         // Verificar se o usuário está autenticado é um usuário comum...
        if (Auth::check() && !Auth::user()->isAdmin) {
            
            return $next($request);
            
        }
        // Redirecionar ou retornar um erro, dependendo da sua necessidade
        return redirect()->route('admin.dashboard')->with('error', 'acesso somente para usuários comuns...');
    }
}
