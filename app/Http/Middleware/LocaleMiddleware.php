<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, \Closure $next): Response
    {
        // Si existe un locale en la sesión, ponemos ese idioma
        if (session()->has('locale')) {
            app()->setLocale(session('locale'));
        }

        return $next($request);
    }
}
