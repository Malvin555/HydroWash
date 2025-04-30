<?php

namespace App\Http\Controllers;

use App\Models\Ironing;
use App\Models\Laundry;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->ajax() ? $request->user->id : Auth::id();

        $status = $request->input('status') ?? '';
        $type = $request->input('type') ?? '';
        $search = $request->input('search') ?? '';
        $perPage = 2;

        // Force page to 1 if it's an AJAX request
        if ($request->ajax()) {
            $request->merge(['page' => 1]);
        }

        $ironingQuery = Ironing::select(
            'id', 
            DB::raw('name_ironing AS name'),
            'retrieval_method', 
            'address_taking', 
            'address_delivery', 
            'status',
            'created_at',
            'estimation',
            DB::raw("'ironing' as type"))
            ->whereDoesntHave('canceled')
            ->where('user_id', $userId)
            ->status($status)
            ->search($search);

        $laundryQuery = Laundry::select(
            'id', 
            DB::raw('name_laundry AS name'),
            'retrieval_method', 
            'address_taking', 
            'address_delivery', 
            'status',
            'created_at',
            'estimation',
            DB::raw("'laundry' as type"))
            ->whereDoesntHave('canceled')
            ->where('user_id', $userId)
            ->status($status)
            ->search($search);
        
        if ($type == 'ironing') {
            $data = $ironingQuery->orderBy('created_at', 'desc')->paginate($perPage)->withQueryString()->setPath(url(route('history')));
        } elseif ($type == 'laundry') {
            $data = $laundryQuery->orderBy('created_at', 'desc')->paginate($perPage)->withQueryString()->setPath(url(route('history')));
        } else {
            $data = DB::table(DB::raw("({$ironingQuery->toSql()} UNION {$laundryQuery->toSql()}) AS combined"))
                ->mergeBindings($ironingQuery->getQuery())
                ->mergeBindings($laundryQuery->getQuery())
                ->orderBy('created_at', 'desc')
                ->paginate($perPage)->withQueryString()->setPath(url(route('history')));
        }

        $paginationHtml = null;
        if ($request->ajax()) {
            $paginationHtml = $data->links('pagination.history-user-pagination')->toHtml();
        }

        // For AJAX requests, at search feature. 
        if ($request->ajax()) {
            return response()->json([
                "status" => "success",
                "message" => "History data retrieved successfully",
                "data" => $data->items(),
                'pagination' => $paginationHtml,
            ], 200);
        }
        
        return view('pages.history-user', compact('data'));
    }

    public function show($id, $serviceType)
    {
        if (!in_array($serviceType, ['ironing', 'laundry'])) {
            return response()->json([
                "status" => "error",
                "message" => "Invalid service type",
            ], 400);
        }

        if ($serviceType == 'ironing') {
            $service = Ironing::with(['canceled', 'transaction'])->findOrFail($id);
        } else if ($serviceType == 'laundry') {
            $service = Laundry::with(['canceled', 'transaction'])->findOrFail($id);
        }

        $hasTransaction = $service->transaction()->exists();

        return response()->json([
            "status" => "success",
            "message" => "Service details retrieved successfully",
            "data" => $service,
            'serviceType' => ucfirst($serviceType),
            'hasTransaction' => $hasTransaction,
        ], 200);
    }
}
