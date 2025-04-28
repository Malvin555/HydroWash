<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Mail\SendVerificationCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{
    public function showRegister(): View 
    {
        return view('auth.register');
    }

    public function showLogin(): View 
    {
        return view('auth.login');
    }

    // public function showVerificationForm(): View 
    // {
    //     return view('auth.verify-code');
    // }

    // public function registerMail(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|min:6|confirmed',
    //     ]);

    //     $otp = mt_rand(100000, 999999);
    //     $name = $request->name;
    //     $expiredAt = now()->addMinutes(5);

    //     session([
    //         'register_data' => [
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'password' => Hash::make($request->password),
    //             'otp' => $otp,
    //             'expires_at' => $expiredAt,
    //         ],
    //     ]);

    //     Mail::to($request->email)->send(new SendVerificationCode($otp, $name));

    //     return redirect()->route('verify-code')->with('success', 'Verification code sent successfully');
    // }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
            'created_who' => $request->name,
        ]);

        return redirect()->route('login')->with('success', 'Account created successfully. Please login.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string',
        ]);

        $user = User::where('name', $request->name)->first();

        if ($user && $user->api_token) {
            return back()->withErrors([
                'name' => 'This account is already logged in on another device.',
            ])->onlyInput('name');
        }

        if ($user && !Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'The provided password is incorrect.',
            ])->onlyInput('password');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::find(Auth::id());
            $isAdmin = $this->isAdminAuthenticated($user);

            if ($isAdmin) {
                $user->api_token = 'KFydnOH6U+vkQwN/Ss/C/uoUDVNGGDzC5ejikUhYs';
            } else {
                $user->api_token = bin2hex(openssl_random_pseudo_bytes(30));
            }
            $user->save();

            session()->put('api_token', $user->api_token);
            session()->put('user_id', Hash::make($user->id));

            return redirect()->route($isAdmin ? 'admin' : 'home');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->api_token = null;
        $user->save();

        session()->forget('api_token');
        session()->forget('user_id');

        $isAdmin = $this->isAdminAuthenticated($user);
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route($isAdmin ? 'login' : 'landing');
    }

    public function isAdminAuthenticated($request)
    {
        if (strtolower($request?->name) === 'admin' && ($request?->password === 'admin123' || Hash::check('admin123', $request?->password))) {
            session()->put('admin_logged_in', true);
            return true;
        }
        return false;
    }
}
