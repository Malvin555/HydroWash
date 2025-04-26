<?php

namespace App\Http\Controllers;

use App\Models\Ironing;
use App\Models\Laundry;
use App\Models\Canceled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CanceledController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search') ?? '';
        $order = $request->input('sort') ?? 'desc';
        $perPage = 5;

        if (!in_array($order, ['asc', 'desc'])) {
            $order = 'desc';
        }

        // Force page to 1 if it's an AJAX request
        if ($request->ajax()) {
            $request->merge(['page' => 1]);
        }

        $canceledServices = Canceled::with(['ironing', 'laundry'])
            ->search($search)
            ->orderBy('created_at', $order)
            ->paginate($perPage)
            ->withQueryString()
            ->setPath(url(route('canceled-admin')));

        $paginationHtml = null;
        if ($request->ajax() && $canceledServices->count() > 0) {
            $paginationHtml = $canceledServices->links('pagination.table-pagination')->toHtml();
        }

        // For AJAX requests, at search feature. 
        if ($request->ajax()) {
            return response()->json([
                "status" => "success",
                "message" => "Canceled services retrieved successfully",
                "data" => $canceledServices->items(),
                'pagination' => $paginationHtml,
            ], 200);
        }


        return view('pages.canceled-admin', compact('canceledServices'));
    }

    public function show($id)
    {
        $canceledServices = Canceled::with(['user', 'ironing', 'laundry'])->findOrFail($id);

        return response()->json([
            "status" => "success",
            "message" => "Canceled services retrieved successfully",
            "data" => $canceledServices,
        ], 200);
    }


    public function cancelOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|integer',
            'service_type' => 'required|string|in:Ironing,Laundry',
            'notes' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput()->with('show_modal', 'modalCancelService');
        }

        $model = $request->input('service_type') === 'Ironing' ? Ironing::class : Laundry::class;
        $serviceId = $request->input('service_type') === 'Ironing' ? 'ironing_id' : 'laundry_id';

        $order = $model::find($request->input('order_id'));
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        Canceled::create([
            'user_id' => $order?->user_id,
            $serviceId => $order?->id,
            'issues' => $request->input('notes') ?? '',
            'created_who' => $order?->user->name,
        ]);

        $order->update([
            'status_report' => 'deleted'
        ]);

        return redirect()->back()->with('success', 'Order canceled successfully');
    }
}
