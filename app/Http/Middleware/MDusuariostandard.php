<?php

namespace App\Http\Middleware;

use Closure;

class MDusuariostandard
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
        
        $a=Session::get('tipo');

         if( $a!='0')
        {
       return response()->view("msj_rechazado");
        }  
        else { 
         return $next($request);
        }  
    
    }
}
