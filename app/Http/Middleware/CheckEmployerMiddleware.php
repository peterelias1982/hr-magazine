<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class CheckEmployerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $ability='isEmployer'): Response
    {
        if(Gate::denies($ability)) {
            return redirect(status: 403)
                ->back()
                ->with(['messages' => json_encode(['error' => ['Unauthorized Action', 'Forbidden']])]);
        }
        return $next($request);
    }
}
