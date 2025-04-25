<?php

namespace App\Http\Controllers;

use App\Models\Ironing;
use App\Models\Laundry;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function index(Request $request)
    {
        $time = $request->input('time') ?? '';
        $search = $request->input('search') ?? '';
        $perPage = 5;

        // Force page to 1 if it's an AJAX request
        if ($request->ajax()) {
            $request->merge(['page' => 1]);
        }

        $transactions = $this->getDataTransaction($time, $search)
            ->paginate($perPage)
            ->withQueryString()
            ->setPath(url(route('transaction-admin')));


        $paginationHtml = null;
        if ($request->ajax() && $transactions->count() > 0) {
            $paginationHtml = $transactions->links('pagination.table-pagination')->toHtml();
        }

        // For AJAX requests, at search feature. 
        if ($request->ajax()) {
            return response()->json([
                "status" => "success",
                "message" => "Transactions retrieved successfully",
                "data" => $transactions->items(),
                'pagination' => $paginationHtml,
            ], 200);
        }

        return view('pages.transaction-admin', compact('transactions'));
    }

    public function show($id)
    {
        $transaction = Transaction::with(['ironing.itemType', 'laundry.itemType'])->findOrFail($id);

        return response()->json([
            "status" => "success",
            "message" => "Transaction retrieved successfully",
            "data" => $transaction,
        ], 200);
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->back()->with('success', 'Transaction deleted successfully');
    }

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

    public function getDataTransaction($time, $search)
    {
        return Transaction::with(['ironing', 'laundry'])
            ->filterTime($time)
            ->search($search)
            ->orderBy('created_at', 'desc');
    }
}
