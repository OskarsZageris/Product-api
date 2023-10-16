<?php

namespace App\Http\Middleware;

use Closure;

class ApiKeyMiddleware
{
    public function handle($request, Closure $next)
    {
        $expectedApiKey = 'my-test-api-key';

        $apiKey = $request->header('x-api-key');

        if (!$apiKey || $apiKey !== $expectedApiKey) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
