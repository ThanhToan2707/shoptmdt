<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Nếu đã đăng nhập thì redirect tới dashboard (không cho vào trang login)
        if (Auth::check()) {
            return redirect()->route('dashboard.index');
        }

        return $next($request);
    }
}
