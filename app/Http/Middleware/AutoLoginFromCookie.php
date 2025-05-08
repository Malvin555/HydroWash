<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AuthController;
use Closure;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AutoLoginFromCookie
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $rememberToken = Cookie::get('remember_token');

        if (!$rememberToken) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        
        if (!Auth::check() && $rememberToken) {
            if ($user = User::where('remember_token', $rememberToken)->first()) {
                Auth::login($user);

                if (!$user->api_token) {
                    $user->api_token = Str::random(60);
                    $user->save();
                }

                session()->put('api_token', $user->api_token);
                session()->put('user_id', Hash::make($user->id));
            }
        }

        return $next($request);
    }
}
