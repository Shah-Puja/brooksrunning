<?php

namespace App\Http\Middleware;

use Closure;

class Allsecurityheaders
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
        $response = $next($request);
        $response->header('X-Frame-Options', 'DENY');
        $response->header('X-XSS-Protection', '1; mode=block');
        $response->header('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
        $response->header('X-Content-Type-Options', 'nosniff');
        return $response;
    }
}
