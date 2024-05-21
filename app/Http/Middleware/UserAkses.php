<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $level): Response
    {
        // jika level user ke level lain
        if (auth()->user()->level == $level) {
            return $next($request);
        }

        if (Auth::user()->level == 'official') {
            return redirect('/official');
        } elseif (Auth::user()->level == 'admin-kejurnas')
            return redirect('/admin-kejurnas');
        // return $next($request);
    }
}
