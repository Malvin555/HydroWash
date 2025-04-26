<?php

namespace App\Http\Controllers;

use App\Models\Ironing;
use App\Models\Laundry;
use App\Models\Transaction;
use App\Rules\ExistsInIroningsOrLaundries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getDataTransaction($time, $search)
    {
        return Transaction::with(['ironing', 'laundry'])
            ->filterTime($time)
            ->search($search)
            ->orderBy('created_at', 'desc');
    }

    public function showCompletePage()
    {
        if (!session()->has('ironing') && !session()->has('laundry')) {
            return redirect()->back()->with('error', 'You are not allowed to access this page without ordering a service.');
        }

        $service = session('ironing') ?? session('laundry');
        session()->forget('ironing');
        session()->forget('laundry');

        return view('pages.complete-added-user', compact('service'));
    }

    public function showCompleteTransaction()
    {
        if (!session()->has('allow_complete_transaction_view')) {
            return redirect()->back()->with('error', 'You are not allowed to view this page before completing the transaction.');
        }

        session()->forget('allow_complete_transaction_view');
        return view('pages.complete-transaction-user');
    }

    public function showTransactionForm($slug = null)
    {
        $parts = explode('-', $slug);
        $prefix = ucfirst($parts[0]);
        $suffix = strtoupper(end($parts));
        $name = $prefix . ' #' . $suffix;

        $ironing = Ironing::with('itemType')
            ->where('name_ironing', $name)
            ->where('status_transaction', 'uncompleted')
            ->first();
        $laundry = null;

        if (!$ironing) {
            $laundry = Laundry::with('itemType')
                ->where('name_laundry', $name)
                ->where('status_transaction', 'uncompleted')
                ->first();
        }

        if (!$ironing && !$laundry) {
            abort(404, 'Transaction not found');
        }

        $transaction = $ironing ?? $laundry;

        return view('pages.transaction-user', compact('transaction'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service-type' => ['required', new ExistsInIroningsOrLaundries()],
            'payment-method' => 'required|in:cash,debit',
            'bank-name' => 'required_if:payment-method,debit',
            'card-number' => 'required_if:payment-method,debit',
            'postal-code' => 'required_if:payment-method,debit',
        ], [
            'bank-name.required_if' => 'Bank name is required',
            'card-number.required_if' => 'Card number is required',
            'postal-code.required_if' => 'Postal code is required',
        ]);

        $serviceName = str_starts_with(strtolower($request->input('service-type')), 'ironing') ? 'ironing' : 'laundry';
        
        if ($serviceName === 'ironing') {
            $model = Ironing::where('name_ironing', $request->input('service-type'))->first();
        } else {
            $model = Laundry::where('name_laundry', $request->input('service-type'))->first();
        }

        $price_transaction =  $model?->price_ironing ?? $model?->price_laundry;
        $decimalPrice = number_format($price_transaction, 2, ',', '.');

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id,
            'ironing_id' => $serviceName === 'ironing' ? $model?->id ?? null : null,
            'laundry_id' => $serviceName === 'laundry' ? $model?->id ?? null : null,
            'method' => $request->input('payment-method'),
            'price_transaction' => $price_transaction,
            'user_transaction' => 'Rp ' . $decimalPrice,
            'card_number' => $request->input('card-number'),
            'postal_code' => $request->input('postal-code'),
            'bank_name' => $request->input('bank-name'),
            'created_who' => Auth::user()->name,
        ]);

        if ($transaction) {
            $model->update([
                'estimation' => now()->addWeek()->toDateString(),
                'status_transaction' => 'completed',
                'status' => 'process'
            ]);
        }

        return redirect()->route('complete-transaction')
            ->with('success', 'Transaction added successfully')
            ->with('allow_complete_transaction_view', true);
    }
}
