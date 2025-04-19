<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        return Feedback::getFeedbacksWithUser(view: 'index');
    }

    public function getFeedbacks()
    {
        return Feedback::getFeedbacksWithUser(view: 'pages.feedback-user');
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