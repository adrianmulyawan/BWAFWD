<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
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
        // Cek apakah user sudah login dan rolesnya adalah "ADMIN"
        // Setelah itu daftarkan middleware ini ke Kernel.php
        if (Auth::user() && Auth::user()->roles === 'ADMIN') {
            return $next($request);
        }
        return redirect()->to('/');
    }
}
