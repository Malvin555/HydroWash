<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\ItemType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\HandleServiceValidation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LaundryController extends Controller
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

        $laundry = $this->getDataLaundry($search, $status, $order)
            ->paginate($perPage)
            ->withQueryString()
            ->setPath(url(route('laundry-admin')));

        $paginationHtml = null;
        if ($request->ajax() && $laundry->count() > 0) {
            $paginationHtml = $laundry->links('pagination.table-pagination')->toHtml();
        }

        // For AJAX requests, at search feature. 
        if ($request->ajax()) {
            return response()->json([
                "status" => "success",
                "message" => "Laundry services retrieved successfully",
                "data" => $laundry->items(),
                'pagination' => $paginationHtml,
            ], 200);
        }

        return view('pages.laundry-admin', compact('laundry'));
    }
    
    public function getDataLaundry($search, $status, $order)
    {
        return Laundry::with('itemType')
            ->laundrySearch($search)
            ->status($status)
            ->orderBy('created_at', $order);
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
        $isAdminRequest = $request->routeIs('laundry-admin.add');

        $serviceValidation = $this->setServiceType('laundry');

        if ($isAdminRequest) {
            $serviceValidation->setValidationBehavior(isAdmin: true, modalId: 'modalAddLaundry');
        }

        $validatedData = $serviceValidation->validateServiceData($request->all());
        if ($validatedData instanceof RedirectResponse) {
            return $validatedData;
        }

        $createdLaundry = $this->saveLaundryData($validatedData, null);

        if ($isAdminRequest) {
            return redirect()->back()->with('success', 'Laundry order successfully created.');
        }

        return redirect()->route('complete-added', ['slug' => Str::slug($createdLaundry->name_laundry)])
            ->with('laundry', $createdLaundry)
            ->with('success', 'Laundry order successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $laundry = Laundry::with(['user', 'itemType'])->find($id);

        return response()->json([
            "status" => "success",
            "message" => "Laundry data retrieved successfully",
            "data" => $laundry,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $laundry = Laundry::with('itemType')->find($id);

        return response()->json([
            "status" => "success",
            "message" => "Laundry data retrieved successfully",
            "data" => $laundry,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->input('id');

        $serviceValidation = $this->setServiceType('Laundry')
            ->setValidationBehavior(isAdmin: true, modalId: 'modalEditLaundry');

        $validatedData = $serviceValidation->validateServiceData($request->all(), $id);

        if ($validatedData instanceof RedirectResponse) {
            return $validatedData;
        }

        $this->saveLaundryData($validatedData, $id);
        return redirect()->back()->with('success', 'Laundry order successfully updated.');
    }

    public function destroy(string $id)
    {
        $laundry = Laundry::findOrFail($id);

        $laundry->transaction()->delete();
        $laundry->canceled()->delete();
        $laundry->delete();

        return redirect()->back()->with('success', 'Laundry successfully deleted.');
    }

    public function showCreateFormWithItemTypes()
    {
        $itemTypes = ItemType::where('role', 'laundry')->get();

        return view('pages.laundry-user', compact('itemTypes'));
    }
}
