<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.profile-user');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $inputs = $request->all();

        foreach ($inputs as $key => $input) {
            if (empty($inputs[$key])) {
                $inputs[$key] = $user?->$key;
            }
        }

        $validator = Validator::make($inputs, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'address' => 'nullable|string',
            'telp' => ['nullable', 'regex:/^(\+62|62|08)[0-9]{9,13}$/'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        $user->update($inputs);

        return back()->with('success', 'Profile successfully updated');
    }

    public function passwordUpdate(Request $request)
    {
        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'Your password is incorrect']);
        }

        $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);
        
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password successfully updated');
    }
}
