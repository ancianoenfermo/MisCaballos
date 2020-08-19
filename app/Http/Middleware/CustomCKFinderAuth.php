<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomCKFinderAuth
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
        $userId = Auth::user()->id; 
        
        config(['ckfinder.backends.default.baseUrl' => config('app.url').'/userfiles/'.Auth::user()->id]);
        
        config(['ckfinder.backends.default.root' => public_path('/userfiles/').Auth::user()->id]);
        
        config(['ckfinder.authentication' => function() {
            return true;
        }]);

        
        return $next($request);
    }
}
