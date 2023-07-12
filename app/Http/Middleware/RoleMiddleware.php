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
        // Obtener el usuario actual
        $user = $request->user();

        // Verificar si el usuario tiene el rol de administrador
        if ($user && $user->role === 'admin') {
            // Si es administrador, se permite el acceso a todas las vistas
            return $next($request);
        }

        // Si es un usuario normal, verificar la ruta actual y redirigir según corresponda
        if ($request->routeIs('validar-reservas') || $request->routeIs('administracion-user.*') || $request->routeIs('dashboard') || $request->routeIs('Funciones.index') || $request->routeIs('Funciones.create') || $request->routeIs('Funciones.edit')) {
            // Redirigir a la página de inicio u otra página de acceso denegado
            return redirect()->route('welcome')->with('error', 'Acceso denegado.');
        }

        // Permitir el acceso a todas las demás rutas
        return $next($request);
    }
}
