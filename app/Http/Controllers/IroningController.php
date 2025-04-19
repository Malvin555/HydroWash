<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|exists:item_types,name_item',
            'amount' => 'required|integer|min:1',
            'price-total' => ['required', new ValidTotalPrice(
                itemName: $request->input('type'),
                itemAmount: $request->input('amount'),
                serviceType: 'ironing',
            )],
            'retrival-method' => 'required|in:delivery,take_away',
            'from-address' => 'required_if:retrival-method,delivery',
            'to-address' => 'required_if:retrival-method,delivery',
        ]);

        $ironing = Ironing::create([
            'user_id' => Auth::id(),
            'item_id' => ItemType::where('name_item', $request->input('type'))->where('role', 'ironing')->first()?->id,
            'name_ironing' => Str::generateRandomString(),
            'price_ironing' => Str::rupiahToFloat($request->input('price-total')),
            'amount_item' => $request->input('amount'),
            'estimation' => null,
            'retrival-method' => $request->input('retrival-method'),
            'status_transaction' => 'uncompleted',
            'status_report' => 'normal',
            'address_taking' => $request->input('from-address'),
            'address_delivery' => $request->input('to-address'),
            'status' => 'pending',
            'notes_ironing' => $request->input('note'),
            'created_who' => Auth::user()?->name,
        ]);

        return view('pages.complete-added-user', ['ironing_id' => $ironing?->id])
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
