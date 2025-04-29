<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ironing;
use App\Models\Laundry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $service = Laundry::count() + Ironing::count();
        $users = User::where('role', 'user')->count();
        $pending = Laundry::where('status', 'pending')->count() + Ironing::where('status', 'pending')->count();
        $completed = Laundry::where('status', 'completed')->count() + Ironing::where('status', 'completed')->count();

        $recentUsers = User::where('role', 'user')->orderBy('created_at', 'desc')->take(5)->get();
        $recentServices = Laundry::with('itemType')->orderBy('created_at', 'desc')->take(3)->get()
            ->concat(Ironing::with('itemType')->orderBy('created_at', 'desc')->take(3)->get())
            ->sortByDesc('created_at');

        return view('pages.dashboard-admin', compact('service', 'users', 'pending', 'completed', 'recentUsers', 'recentServices'));
    }
}
