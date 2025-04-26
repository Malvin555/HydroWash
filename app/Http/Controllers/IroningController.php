<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Ironing;
use App\Models\ItemType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Rules\ValidTotalPrice;
use Illuminate\Support\Facades\Auth;

class IroningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(ServiceRequest $request)
    {
        $data = $request->validated();

        $ironing = Ironing::create([
            'user_id' => Auth::id(),
            'item_id' => ItemType::where('name_item', $data['type'])->where('role', 'ironing')->first()?->id,
            'name_ironing' => Str::generateRandomString('Ironing'),
            'price_ironing' => Str::rupiahToFloat($data['price-total']),
            'amount_item' => $data['amount'],
            'estimation' => null,
            'retrieval_method' => $data['retrieval-method'],
            'status_transaction' => 'uncompleted',
            'status_report' => 'normal',
            'address_taking' => $data['address'],
            'address_delivery' => $data['destination'],
            'status' => 'pending',
            'notes_ironing' => $data['note'],
            'created_who' => Auth::user()?->name,
        ]);

        return redirect()->route('complete-added')
                ->with('ironing', $ironing)
                ->with('success', 'Ironing order successfully created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showCreateFormWithItemTypes()
    {
        $itemTypes = ItemType::where('role', 'ironing')->get();

        return view('pages.ironing-user', compact('itemTypes'));
    }
}
