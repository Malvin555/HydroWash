<?php

namespace App\Http\Controllers;

use App\HandleServiceValidation;
use App\Models\Ironing;
use App\Models\ItemType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class IroningController extends Controller
{
    use HandleServiceValidation;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search') ?? '';
        $order = $request->input('sort') ?? 'desc';
        $status = $request->input('status') ?? '';
        $perPage = 10;

        if (!in_array($order, ['asc', 'desc'])) {
            $order = 'desc';
        }

        // Force page to 1 if it's an AJAX request
        if ($request->ajax()) {
            $request->merge(['page' => 1]);
        }

        $ironing = $this->getDataIroning($search, $status, $order)
            ->paginate($perPage)
            ->withQueryString()
            ->setPath(url(route('ironing-admin')));

        $paginationHtml = null;
        if ($request->ajax() && $ironing->count() > 0) {
            $paginationHtml = $ironing->links('pagination.table-pagination')->toHtml();
        }

        // For AJAX requests, at search feature. 
        if ($request->ajax()) {
            return response()->json([
                "status" => "success",
                "message" => "Ironing services retrieved successfully",
                "data" => $ironing->items(),
                'pagination' => $paginationHtml,
            ], 200);
        }

        return view('pages.ironing-admin', compact('ironing'));
    }

    public function getDataIroning($search, $status, $order, $isPrint = false)
    {
        $ironingQuery = Ironing::with('orderItems.itemType')
            ->ironingSearch($search)
            ->status($status)
            ->orderBy('created_at', $order);

        if ($isPrint) {
            $ironingQuery->with('user');
        }

        return $ironingQuery;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $isAdminRequest = $request->routeIs('ironing-admin.add');

        $serviceValidation = $this->setServiceType('ironing');

        if ($isAdminRequest) {
            $serviceValidation->setValidationBehavior(isAdmin: true, modalId: 'modalAddIroning');
        }

        $validatedData = $serviceValidation->validateServiceData($request->all());
        if ($validatedData instanceof RedirectResponse) {
            return $validatedData;
        }

        $createdIroning = $this->saveIroningData($validatedData, null);

        if ($isAdminRequest) {
            return redirect()->back()->with('success', 'Ironing order successfully created.');
        }

        return redirect()->route('complete-added', ['slug' => Str::slug($createdIroning->name_ironing)])
            ->with('success', 'Ironing order successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ironing = Ironing::with(['user', 'itemType'])->find($id);

        return response()->json([
            "status" => "success",
            "message" => "Ironing data retrieved successfully",
            "data" => $ironing,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ironing = Ironing::with('itemType')->find($id);

        return response()->json([
            "status" => "success",
            "message" => "Ironing data retrieved successfully",
            "data" => $ironing,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');

        $serviceValidation = $this->setServiceType('ironing')
            ->setValidationBehavior(isAdmin: true, modalId: 'modalEditIroning');

        $validatedData = $serviceValidation->validateServiceData($request->all(), $id);

        if ($validatedData instanceof RedirectResponse) {
            return $validatedData;
        }

        $this->saveIroningData($validatedData, $id);
        return redirect()->back()->with('success', 'Ironing order successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ironing = Ironing::findOrFail($id);

        $ironing->transaction()->delete();
        $ironing->canceled()->delete();
        $ironing->delete();

        return redirect()->back()->with('success', 'Ironing successfully deleted.');
    }

    public function showCreateFormWithItemTypes()
    {
        $itemTypes = ItemType::where('role', 'ironing')->get();

        return view('pages.ironing-user', compact('itemTypes'));
    }
}
