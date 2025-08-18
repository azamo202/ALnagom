<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('web')->user();

        if (!$user) {
            return response()->json(['message' => 'يجب تسجيل الدخول أولاً.'], 401);
        }

        if ($user->role !== 'user') {
            return response()->json(['message' => 'ليس لديك صلاحية المستخدم.'], 403);
        }

        return $next($request);
    }
}
