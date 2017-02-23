<?php

namespace App\Http\Middleware;

use Closure;

class Keuangan
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
       if (auth()->check() && $request->user()->type_user=='Keuangan') {
            return $next($request);
        }
        elseif (auth()->check() && $request->user()->type_user=='Admin') {
            return $next($request);
        }
        else{
      
        return redirect()->guest('/akses');
       }
    }
}
