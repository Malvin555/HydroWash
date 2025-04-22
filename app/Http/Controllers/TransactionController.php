<?php

namespace App\Http\Controllers;

use App\Models\Ironing;
use App\Models\Laundry;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showCompletePage()
    {
        if (!session()->has('ironing') && !session()->has('laundry')) {
            return redirect()->route('home');
        }

        $service = session('ironing') ?? session('laundry');
        session()->forget('ironing');
        session()->forget('laundry');

        return view('pages.complete-added-user', compact('service'));
    }

    public function showTransactionForm($slug = null)
    {
        $parts = explode('-', $slug);
        $prefix = ucfirst($parts[0]);
        $suffix = strtoupper(end($parts));
        $name = $prefix . ' #' . $suffix;

        $ironing = Ironing::where('name_ironing', $name)->first();
        $laundry = null;
        
        if (!$ironing) {
            $laundry = Laundry::where('name_laundry', $name)->first();
        }
        
        if (!$ironing && !$laundry) {
            abort(404, 'Transaction not found');
        }
        
        $transaction = $ironing ?? $laundry;
        
        return view('pages.transaction-user', compact('transaction'));
    }
}
