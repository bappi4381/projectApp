<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Please login to access the secure administrative portal.');
        }

        // 2. Here you can add specific "Admin" role checks in the future
        // if (Auth::user()->role !== 'admin') { abort(403); }

        return $next($request);
    }
}
