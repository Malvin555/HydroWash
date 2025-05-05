<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ironing;
use App\Models\Laundry;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

    public function userDashboard() {
        $activeOrders = Laundry::where('user_id', Auth::id())
            ->where('status', '!=', 'completed')
            ->count() 
            + Ironing::where('user_id', Auth::id())
            ->where('status', '!=', 'completed')
            ->count();

        $completedOrders = Laundry::where('user_id', Auth::id())
            ->where('status', 'completed')
            ->count()
            + Ironing::where('user_id', Auth::id())
            ->where('status', 'completed')
            ->count();

        $expenses = Transaction::where('user_id', Auth::id())->sum('price_transaction');

        return view('pages.home-user', compact('activeOrders', 'completedOrders', 'expenses'));
    }
}
