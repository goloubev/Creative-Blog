<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReaderMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Not reader
        if (auth()->user()->role != User::ROLE_READER) {
            return back()->with('error', 'Access denied');
        }

        return $next($request);
    }
}
