<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $autorizacion = $request->header('Authorization');
            $jwt = explode(' ', $autorizacion);
            $key = env('JWT_SECRET');
            $algoritmo = env('JWT_ALGORITHM');

            $datos = JWT::decode($jwt[1], new Key($key, $algoritmo));

            $request->attributes->add([
                'usuario' => $datos->usuario,
                'rol' => $datos->rol,
                'id' => $datos->nombre
            ]);
        } catch (\Exception $e) {
            return response()->json(['status' => 'Token no autorizado'.$e->getMessage()], 401);
        }
        return $next($request);
    }
}
