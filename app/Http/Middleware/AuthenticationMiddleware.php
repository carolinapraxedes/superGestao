<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $typeAuthentication)
    {
        //return $next($request);
        echo $typeAuthentication;

        //verifica se o usuario possui acesso a rota
        if(true){
            return $next($request);
        }else{
            return Response('Acesso negado! rota exige autenticação');
        }

        
    }
}
