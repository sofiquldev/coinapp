<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated and has admin role
        if (Auth::check() && Auth::user()->role === 1) {
            return $next($request);
        }

        // If not admin, redirect or return response as needed
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
