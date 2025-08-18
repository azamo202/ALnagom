<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth('web')->user();

        // السماح بزيارة صفحة تسجيل الدخول بدون تحقق صلاحية
        if ($request->is('admin/login') || $request->is('admin/logout')) {
            return $next($request);
        }

        // التحقق من تسجيل الدخول
        if (!$user) {
            // إعادة توجيه لصفحة تسجيل الدخول بدلاً من رسالة JSON
            return redirect()->route('filament.auth.login');
        }

        // التحقق من صلاحية الأدمن
        if ($user->role !== 'admin') {
            abort(403, 'ليس لديك صلاحية الأدمن.');
        }

        return $next($request);
    }
}
