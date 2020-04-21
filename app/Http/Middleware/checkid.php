<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class checkid
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
      if(Auth::user()&&Auth::user()->Ten_admin=='admin')
      {
        
         return $next($request);
     }
    else
    {
        return redirect('/admin/home');  
    }
    }
}
