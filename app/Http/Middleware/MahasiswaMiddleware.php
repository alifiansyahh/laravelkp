<?php

namespace App\Http\Middleware;





use Closure;
use Illuminate\Http\Request;

class MahasiswaMiddleware
{
    public function handle(Request $request, Closure $next): mixed
    {
        if (auth()->check() && auth()->user()->role === 'mahasiswa') {
            return $next($request);
        }

        return redirect('/login')->with('error', 'Akses hanya untuk mahasiswa.');
    }
}

