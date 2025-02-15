<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class SadminMiddleware{
    public function handle(Request $request, Closure $next): Response{
        if (Auth::check() && Auth::user()->type === 'sAdmin') {
            return $next($request); 
        }
        return abort(403, 'Sizga bu sahifaga kirishga ruxsat yo‘q!');
    }
}
