<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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
        // Verifica se o usuário já está autenticado
        if (Auth::guard($guard)->check()) {
            // Evita redirecionar se a requisição for para a rota de registro
            if ($request->is('register')) {
                return $next($request);
            }

            return redirect('/browser')->whith('success','Conta criada com sucesso!');
        }
        return $next($request);
    }
}
