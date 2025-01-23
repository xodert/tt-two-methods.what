<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Responses\CustomJsonResponse;

class RedirectIfUnauthenticated
{
    public function handle(Request $request, Closure $next, string ...$guards): mixed
    {
        if ($request->expectsJson()) {
            return CustomJsonResponse::error('Unauthorized', null, 401);
        }

        return $next($request);
    }
}
