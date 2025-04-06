<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CacheControl
{
    /**
     * Maneja la solicitud y agrega cabeceras de cacheo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Define la cabecera para que el navegador almacene en caché por 1 hora (3600 segundos)
        $response->headers->set('Cache-Control', 'public, max-age=3600, must-revalidate');

        // Opcional: agregar Last-Modified o ETag según convenga para una validación más precisa
        // $response->headers->set('ETag', md5($response->getContent()));

        return $response;
    }
}