<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == 'penyuluh' || $guard == 'bpp' || $guard == 'pegawai_dinas' || $guard == 'kepala_dinas' || $guard == 'admin') {
             if (Auth::guard($guard)->check()) {
                    return redirect('/');
             }
        }

        return $next($request);
    }
}
