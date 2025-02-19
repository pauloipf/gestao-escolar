<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $type  Tipo esperado (ex: 'estudante' ou 'professor')
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, $type)
    {
        // Verifica se o usuário está autenticado e se seu tipo confere com o parâmetro passado
        if (Auth::check() && Auth::user()->tipo === $type) {
            return $next($request);
        }
        
        // Se o usuário não for do tipo esperado, retorna um erro 403 (Forbidden)
        abort(403, 'Acesso não autorizado.');
    }
}
