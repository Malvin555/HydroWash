<?php

namespace App\Http\Controllers;

use App\Models\Canceled;
use App\Models\Ironing;
use App\Models\Laundry;
use Illuminate\Http\Request;

class CanceledController extends Controller
{
    public function cancelOrder(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'service_type' => 'required|string|in:Ironing,Laundry',
        ]);

        $model = $request->input('service_type') === 'Ironing' ? Ironing::class : Laundry::class;
        $serviceId = $request->input('service_type') === 'Ironing' ? 'ironing_id' : 'laundry_id';

        $order = $model::find($request->input('order_id'));
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }

        Canceled::create([
            'user_id' => $order?->user_id,
            $serviceId => $order?->id,
            'issues' => '',
            'created_who' => $order?->user->name,
        ]);

        return redirect()->back()->with('success', 'Order canceled successfully');
    }
}
