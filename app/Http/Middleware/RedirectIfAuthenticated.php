<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->isAdmin){
                Log::debug('redirecionar: admin Dash ');
                return redirect()->route('admin.dashboard');
            }
            Log::debug('redirecionar: colab Dash ');
            return redirect()->route('colaboradores.dashboard');
        }
        Log::debug('Redirecionando:...');
        return $next($request);
    }
}
