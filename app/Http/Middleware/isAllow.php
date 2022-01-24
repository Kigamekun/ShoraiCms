<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class isAllow
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



        $x = explode('/',$request->path());

        $teruskan = FALSE;

        foreach ((array)json_decode(Auth::user()->permission) as $key => $value) {
            if (in_array(strtolower($value),$x)) {
                $teruskan = TRUE;
            }
        }

        if ($teruskan) {
            return $next($request);
        }
        else {
           if (Auth::user()->role == 0) {
            return $next($request);
           }
           else {
            dd('Gak ada');
           }
        }
    }
}
