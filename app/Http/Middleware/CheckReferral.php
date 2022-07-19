<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckReferral;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;
class CheckReferral
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( $request->hasCookie('referral_link')) {
            return $next($request);
        }
        else {
            if( $request->query('ref') ) {
                return redirect($request->fullUrl())->withCookie(cookie()->forever('referral_link', $request->query('ref')));
            }
        }

        return $next($request);
    }
}