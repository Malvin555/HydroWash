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

    public function getFeedbacksAdmin(Request $request)
    {
        $starRating = $request->input('star_rating') ?? null;
        $order = $request->input('order') ?? 'desc';
        $search = $request->input('search') ?? '';
        $perPage = 5;

        if (!in_array($order, ['asc', 'desc'])) {
            $order = 'desc';
        }

        // Force page to 1 if it's an AJAX request
        if ($request->ajax()) {
            $request->merge(['page' => 1]);
        }

        $feedbacks = Feedback::with('user')
            ->starRating($starRating)
            ->search($search)
            ->orderBy('created_at', $order)
            ->paginate($perPage)
            ->withQueryString()
            ->setPath(url(route('feedback-admin')));

        $paginationHtml = null;
        if ($request->ajax() && $feedbacks->count() > 0) {
            $paginationHtml = $feedbacks->links('pagination.history-user-pagination')->toHtml();
        }

        // For AJAX requests, at search feature. 
        if ($request->ajax()) {
            return response()->json([
                "status" => "success",
                "message" => "Feedback retrieved successfully",
                "data" => $feedbacks->items(),
                'pagination' => $paginationHtml,
            ], 200);
        }

        return view('pages.feedback-admin', compact('feedbacks'));
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

    public function show($id)
    {
        $feedback = Feedback::with('user')->findOrFail($id);

        return response()->json([
            "status" => "success",
            "message" => "Feedback retrieved successfully",
            "data" => $feedback,
        ], 200);
    }

    
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();

        return redirect()->back()->with('success', 'Feedback successfully deleted.');
    }
}
