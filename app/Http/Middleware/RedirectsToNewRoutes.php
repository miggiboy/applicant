<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Redirection\RedirectionMap as Map;

class RedirectsToNewRoutes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route = Map::where('old', $request->path())->first();

        if ($route) {
            return redirect($route->new, 301);
        }

        return $next($request);
    }
}
