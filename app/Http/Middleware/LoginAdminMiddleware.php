<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // var_dump(Auth::user());
        if (Auth::check()) {
            if (Auth::user()->role == 1) {
                return $next($request);
            } else
                return redirect('login');
        }
        return redirect('login');
    }
}
