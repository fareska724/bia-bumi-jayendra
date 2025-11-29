<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // cek role admin (sesuaikan nama kolom di tabel users)
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
