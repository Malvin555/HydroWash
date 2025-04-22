<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\ItemType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Rules\ValidTotalPrice;
use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Auth;

class LaundryController extends Controller
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

        $laundry = Laundry::create([
            'user_id' => Auth::id(),
            'item_id' => ItemType::where('name_item', $data['type'])->where('role', 'laundry')->first()?->id,
            'name_laundry' => Str::generateRandomString('Laundry'),
            'price_laundry' => Str::rupiahToFloat($data['price-total']),
            'amount_item' => $data['amount'],
            'estimation' => null,
            'retrieval_method' => $data['retrieval-method'],
            'status_transaction' => 'uncompleted',
            'status_report' => 'normal',
            'address_taking' => $data['address'],
            'address_delivery' => $data['destination'],
            'status' => 'pending',
            'notes_laundry' => $data['note'],
            'created_who' => Auth::user()?->name,
        ]);

        return redirect()->route('complete-added')
                ->with('laundry', $laundry)
                ->with('success', 'Laundry order successfully created.');
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
        $itemTypes = ItemType::where('role', 'laundry')->get();

        return view('pages.laundry-user', compact('itemTypes'));
    }
}
