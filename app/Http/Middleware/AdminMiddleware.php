<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        if (auth()->check() && auth()->user->isAdmin()) {
            session()->flash('success', 'Hola :) ');

            return $next($request);
        }

        // abort(403);
        session()->flash('error', 'Piratilla... no puedes entrar en zona admin');

        return redirect()->route('inicio');
    }
}
