<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('index', compact('feedbacks'));
    }

    public function getFeedbacks()
    {
        $feedbacks = Feedback::orderBy('created_at', 'desc')->get();
        return view('pages.feedback-user', compact('feedbacks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|min:1|max:5',
            'comment' => 'required',
        ]);

        $user = Auth::user();

        Feedback::create([
            'user_id' => $user->id,
            'star_rating' => $request->rating,
            'comment' => $request->comment,
            'created_who' => $user->name,
        ]);

        return redirect()->back()->with('success', 'Feedback successfully added.');
    }
}
