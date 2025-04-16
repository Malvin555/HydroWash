<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('index', compact('feedbacks'));
    }
}
