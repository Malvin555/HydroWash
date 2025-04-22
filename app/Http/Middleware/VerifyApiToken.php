<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class VerifyApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        $hashedUserId = $request->header('X-USER-ID');

        if (!$token || !$hashedUserId) {
            return response()->json(['error' => "Unauthorized"], 401);
        }

        $user = User::where('api_token', $token)->first();

        if (!$user) {
            return response()->json(['error' => "Inavalid token"], 401);
        }

        if (!Hash::check($user->id, $hashedUserId)) {
            return response()->json(['error' => "Unauthorized"], 401);
        }

        $request->user = $user;

        return $next($request);
    }
}
