<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAdmin
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
      if(Auth::check())
      {
          $user  = Auth::user();

          if($user->level === 1 || $user->level === 2){
              return $next($request);
          }
          else
          {
              Auth::logout();
              return redirect()->route('login');
          }
      }
      else
      {
        return redirect()->route('login');
      }
    }
}
