<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    //check for apit
     public function handle($request, Closure $next)
    {
        // hash token and get into database to compare
        // replace if check bellow
        if ( auth()->check() && auth()->user()->is_admin == 1) {
            return $next($request);
        }
        return redirect('/');
    }
}
