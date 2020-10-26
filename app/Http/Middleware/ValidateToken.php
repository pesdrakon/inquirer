<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ValidateToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = config('app.api_token');
        $header = $request->header('Authorization', '');
        if (Str::startsWith($header, 'Bearer ')) {
            $request_token = Str::substr($header, 7);
        }

        if (!isset($request_token) || empty($request_token) || $token !== $request_token) {
            abort('401', 'Token was invalid');
        }
        return $next($request);
    }
}
