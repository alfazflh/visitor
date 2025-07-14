<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if (auth()->check()) {
            if (auth()->user()->role === $role) {
                return $next($request);
            }

            // Redirect sesuai role yang benar
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (auth()->user()->role === 'user') {
                return redirect()->route('user.registrasi');
            }
        }

        abort(403, 'Unauthorized');
    }
}
