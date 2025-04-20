<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Mail\SendVerificationCode;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route($this->isAdminAuthenticated($request) ? 'admin' : 'home');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
    }

    public function logout(Request $request)
    {
        $isAdmin = $this->isAdminAuthenticated(Auth::user());
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route($isAdmin ? 'login' : 'landing');
    }

    public function isAdminAuthenticated($request)
    {
        if ($request?->name === 'Admin' && ($request?->password === 'pass123' || Hash::check('pass123', $request?->password))) {
            // session(['logged_as_admin' => true]);
            return true;
        }

        // session(['logged_as_user' => true]);
        return false;
    }
}
