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
        $service = $this->countOrders(null, null, true);
        $users = User::where('role', 'user')->count();
        $pending = $this->countOrders('=', 'pending', true);
        $completed = $this->countOrders('=', 'completed', true);

        $recentUsers = User::where('role', 'user')->orderBy('created_at', 'desc')->take(5)->get();
        $recentServices = Laundry::with('orderItems.itemType')
            ->whereDoesntHave('canceled')
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get()
            ->concat(
                Ironing::with('orderItems.itemType')
                ->whereDoesntHave('canceled')
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get()
            )
            ->sortByDesc('created_at');

        return view('pages.dashboard-admin', compact('service', 'users', 'pending', 'completed', 'recentUsers', 'recentServices'));
    }

    public function userDashboard() {
        $activeOrders = $this->countOrders('!=', 'completed');
        $completedOrders = $this->countOrders('=', 'completed');

        $expenses = DB::table('transaction')
            ->leftJoin('laundry', 'transaction.laundry_id', '=', 'laundry.id')
            ->leftJoin('ironing', 'transaction.ironing_id', '=', 'ironing.id')
            ->leftJoin('canceled as c1', 'c1.laundry_id', '=', 'laundry.id')
            ->leftJoin('canceled as c2', 'c2.ironing_id', '=', 'ironing.id')
            ->where('transaction.user_id', Auth::id())
            ->whereNull('c1.id')
            ->whereNull('c2.id')
            ->sum('price_transaction');

        return view('pages.home-user', compact('activeOrders', 'completedOrders', 'expenses'));
    }

    private function countOrders($operator = null, $status = null, $isAdmin = false)
    {
        $laundryQuery = Laundry::whereDoesntHave('canceled');
        $ironingQuery = Ironing::whereDoesntHave('canceled');

        if (!$isAdmin) {
            $userId = Auth::id();
            $laundryQuery->where('user_id', $userId);
            $ironingQuery->where('user_id', $userId);
        }

        if ($operator && $status) {
            $laundryQuery->where('status', $operator, $status);
            $ironingQuery->where('status', $operator, $status);
        }

        return $laundryQuery->count() + $ironingQuery->count();
    }
}
