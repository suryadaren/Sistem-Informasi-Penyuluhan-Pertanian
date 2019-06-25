<?php

namespace App\Http\Middleware;

use Closure;

class isPegawaiDinas
{
    public function handle($request, Closure $next)
    {
        if (!auth()->guard('pegawai_dinas')->check()) {
            return redirect(url('/'));
        }
        return $next($request);
    }
}
