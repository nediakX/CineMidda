<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && $user->role === 'admin') {
            return $next($request);
        }

        if ($request->routeIs('validar-reservas') || $request->routeIs('administracion-user.*') || $request->routeIs('dashboard') || $request->routeIs('funciones.index') || $request->routeIs('funciones.create') || $request->routeIs('funciones.edit')) {
            return redirect()->route('welcome')->with('error', 'Acceso denegado.');
        }

        return $next($request);
    }
}
