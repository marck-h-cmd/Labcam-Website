<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Evento;
use Carbon\Carbon;

class UpdateEventosMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Actualiza los eventos "futuro" cuya fecha es anterior a hoy, cambiándolos a "pasado"
        Evento::where('categoria', 'futuro')
            ->whereDate('fecha', '<', Carbon::today()->toDateString())
            ->update(['categoria' => 'pasado']);

        return $next($request);
    }
}

