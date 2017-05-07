<?php

namespace App\Http\Middleware;

use Closure;

class AuthApi
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
        $cookie_code = $request->cookie('cookie_code');
        if (empty($cookie_code)) {
            $cookie_code = str_random(30) . time();
        }
        if(!defined('COOKIE_CODE')){
            define('COOKIE_CODE', 'zREQCkT29RGfDXZW6LMgnFjRiiNirf1492480507');
        }
        
        return $next($request);
    }
}
