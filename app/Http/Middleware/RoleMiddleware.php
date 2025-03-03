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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // if user not logged in, redirect to login page
        if (! $request->user()) {
            return to_route('login');
        }

        // dd($request->user()->role, $role); // me regreso admin y admin cuando hice login con admin@gmail.com

        // Si el usuario no tiene el rol requerido, redirige a la página de inicio
        // Si user()->role es 'admin' lo dejar pasar.
        if ($request->user()->role === $role) {
            return $next($request);
        }

        return to_route('dashboard');
    }
}
