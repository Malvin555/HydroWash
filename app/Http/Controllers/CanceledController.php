<?php

namespace App\Http\Controllers;

use App\Models\Ironing;
use App\Models\Laundry;
use App\Models\Canceled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CanceledController extends Controller
{
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

        return redirect()->back()->with('success', 'Order canceled successfully');
    }
}
