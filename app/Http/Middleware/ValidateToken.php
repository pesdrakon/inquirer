<?php

namespace App\Http\Middleware;

use App\Repositories\ApiTokenRepository;
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
        $tokens = (new ApiTokenRepository)->getValidArray()?:[];
        $header = $request->header('Authorization', '');
        if (Str::startsWith($header, 'Bearer ')) {
            $request_token = Str::substr($header, 7);
        }
        if (!isset($request_token) || empty($request_token) || !in_array(hash('sha256', $request_token), $tokens, true)) {
            abort('401', 'Token was invalid');
        }
        return $next($request);
    }
}
