<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProducerMiddleware
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
      if(Auth::user() === null){
        return redirect('/');
      }
      if(Auth::user()->role !== 'producer') {
        return redirect(route('home'));
      }
      return $next($request);
    }
}
