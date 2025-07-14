<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class is_Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        // برای API ها
        if ($request->wantsJson()) {
            if (!Auth::guard('sanctum')->check()) {
                return response()->json(['message' => 'Unauthenticated'], 401);
            }

            if (!Auth::guard('sanctum')->user()->is_admin) {
                return response()->json(['message' => 'Forbidden'], 403);
            }

            return $next($request);
        }

        // برای وب معمولی
        if (!Auth::guard('web')->check()) {
            return redirect()->guest(route('login'));
        }

        if (!Auth::guard('web')->user()->is_admin) {
            abort(403, 'شما دسترسی به این بخش را ندارید');
        }

        return $next($request);
    }
}
