<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Verificamos si el usuario inició sesión
        if (!Auth::check()) {
            return redirect('/login');
        }

        // 2. Verificamos si el usuario tiene el rol que pide la ruta
        if (!Auth::user()->roles->contains('name', $role)) {
            // Si no lo tiene, le mostramos un error
            abort(403, 'Acceso denegado. No tienes permisos de ' . $role . ' para ver esta página.');
        }

        // 3. Si todo está bien, lo dejamos pasar
        return $next($request);
    }
}
