<?php

namespace App\Http\Controllers;

use App\Models\Ironing;
use App\Models\Laundry;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Rules\ExistsInIroningsOrLaundries;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $time = $request->input('time') ?? '';
        $search = $request->input('search') ?? '';
        $perPage = 10;

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

    public function showCompletePage($slug)
    {
        [$model, $serviceType, $serviceName] = $this->getModelAndService($slug);

        $data = $model::with('orderItems.itemType')
            ->where("name_{$serviceType}", $serviceName)
            ->whereDoesntHave('transaction')
            ->firstOrFail();

        return view('pages.complete-added-user', compact('data', 'serviceType'));
    }

    public function showTransactionForm(Request $request, $slug = null)
    {
        [$model, $serviceType, $serviceName] = $this->getModelAndService($slug);

        $transaction = $model::with('orderItems.itemType')
            ->where("name_{$serviceType}", $serviceName)
            ->whereDoesntHave('transaction')
            ->firstOrFail();

        if ($request->ajax()) {
            return response()->json([
                "status" => "success",
                "message" => "Transaction retrieved successfully",
                "data" => $transaction,
            ], 200);
        }

        return view('pages.transaction-user', compact('transaction', 'serviceType'));
    }

    public function showCompleteTransaction($slug)
    {
        [$model, $serviceType, $serviceName] = $this->getModelAndService($slug);

        $service = $model::with('transaction')
            ->where("name_{$serviceType}", $serviceName)
            ->has('transaction')
            ->firstOrFail();

        $transaction = $service->transaction;

        return view('pages.complete-transaction-user', compact('transaction', 'serviceType'));
    }

    public function store(Request $request)
    {
        $isRequestAdmin = $request->routeIs('transaction-admin.add');

        $validator = Validator::make($request->all(), [
            'service-type' => ['required', new ExistsInIroningsOrLaundries()],
            'payment-method' => 'required|in:cash,debit',
            'bank-name' => 'required_if:payment-method,debit',
            'card-number' => 'required_if:payment-method,debit',
            'postal-code' => 'required_if:payment-method,debit',
        ], [
            'bank-name.required_if' => 'Payment name is required.',
            'card-number.required_if' => 'Card number is required.',
            'postal-code.required_if' => 'Postal code is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput()
                ->with($isRequestAdmin ? ['show_modal' => 'modalTransaction'] : []);
        }

        $serviceType = str_starts_with(strtolower($request->input('service-type')), 'ironing') ? 'ironing' : 'laundry';
        $model = $serviceType === 'ironing'
            ? Ironing::where('name_ironing', $request->input('service-type'))->firstOrFail()
            : Laundry::where('name_laundry', $request->input('service-type'))->firstOrFail();

        $priceTransaction = $model?->price_ironing ?? $model?->price_laundry;
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'ironing_id' => $serviceType === 'ironing' ? $model?->id : null,
            'laundry_id' => $serviceType === 'laundry' ? $model?->id : null,
            'method' => $request->input('payment-method'),
            'price_transaction' => $priceTransaction,
            'user_transaction' => 'Rp ' . number_format($priceTransaction, 2, ',', '.'),
            'card_number' => $request->input('card-number'),
            'postal_code' => $request->input('postal-code'),
            'bank_name' => $request->input('bank-name'),
            'created_who' => Auth::user()->name,
        ]);

        if ($transaction) {
            $model->update([
                'estimation' => now()->addWeek()->toDateString(),
                'status_transaction' => 'completed',
                'status' => 'process',
            ]);
        }

        return $isRequestAdmin
            ? redirect()->back()->with('success', 'Transaction added successfully')
            : redirect()->route('complete-transaction', ['slug' => Str::slug($model->name_ironing ?? $model->name_laundry)])
                ->with('success', 'Transaction added successfully')
                ->with('allow_complete_transaction_view', true);
    }

    public function getDataTransaction($time, $search)
    {
        return Transaction::with(['ironing', 'laundry'])
            ->filterTime($time)
            ->search($search)
            ->orderBy('created_at', 'desc');
    }

    private function getModelAndService($slug)
    {
        $serviceType = str_starts_with(strtolower($slug), 'ironing') ? 'ironing' : 'laundry';
        $model = $serviceType === 'ironing' ? Ironing::class : Laundry::class;
        $serviceName = Str::formatServiceNameFromSlug($slug);

        return [$model, $serviceType, $serviceName];
    }
}