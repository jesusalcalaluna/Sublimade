<?php

namespace App\Http\Middleware;

use Closure;

class apitoken
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
  
     $token = $r->get("api_token");
     $u=Usuario::where("api_token","=",$token)->first();
        
         if($u!=null)
        {
            return $next($request);
         
        }  
     
     
      return ;
         
       
         

       
    }
}
