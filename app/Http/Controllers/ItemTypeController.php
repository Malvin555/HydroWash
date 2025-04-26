<?php

namespace App\Http\Controllers;

use App\Models\ItemType;
use App\Rules\UniqueItemNamePerRole;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $type = $request->input('type') ?? '';
        $search = $request->input('search') ?? '';
        $perPage = 6;

        // Force page to 1 if it's an AJAX request
        if ($request->ajax()) {
            $request->merge(['page' => 1]);
        }

        $itemName =  ItemType::select('name_item')->distinct()->get();

        $itemType = ItemType::type($type)
            ->search($search)
            ->orderBy('created_at', 'desc')
            ->paginate($perPage)
            ->withQueryString()
            ->setPath(url(route('item-types')));

        $paginationHtml = null;
        if ($request->ajax() && $itemName->count() > 0) {
            $paginationHtml = $itemType->links('pagination.history-user-pagination')->toHtml();
        }

        // For AJAX requests, at search feature. 
        if ($request->ajax()) {
            return response()->json([
                "status" => "success",
                "message" => "Item types retrieved successfully",
                "data" => $itemType->items(),
                'pagination' => $paginationHtml,
            ], 200);
        }

        return view('pages.item-types-admin', compact('itemType', 'itemName'));
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
        $validator = Validator::make($request->all(), [
            'name_item' => [
                'required',
                'string',
                'max:255',
                new UniqueItemNamePerRole(
                    role: $request->input('role'), 
                    exceptedId: null
                ),
            ],
            'role' => 'required|in:ironing,laundry',
            'image_item' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price_item' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput()->with('show_modal', 'modalAddType');
        }

        $data = $validator->validated();

        if ($request->hasFile('image_item')) {
            $imagePath = $request->file('image_item')->store('item_types', 'public');
            $data['image_item'] = $imagePath;
        }

        $data['created_who'] = Auth::user()->name;
        ItemType::create($data);

        return redirect()->back()->with('success', 'Item type added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, $serviceType)
    {
        if (!in_array($serviceType, ['ironing', 'laundry'])) {
            return response()->json([
                "status" => "error",
                "message" => "Invalid service type",
            ], 400);
        }

        $itemType = ItemType::where('role', $serviceType)->findOrFail($id);

        return response()->json([
            "status" => "success",
            "message" => "Item type retrieved successfully",
            "data" => $itemType,
        ], 200);
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
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:item_types,id',
            'name_item' => [
                'required',
                'string',
                'max:255',
                new UniqueItemNamePerRole(
                    role: $request->input('role'), 
                    exceptedId: $request->input('id')
                ),
            ],
            'role' => 'required|in:ironing,laundry',
            'image_item' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price_item' => 'required',
        ]);

        // Always send back the name_item to old() even if validation fails
        if ($validator->fails()) {
            return redirect()->back()
            ->withErrors($validator->errors())
            ->withInput()
            ->with('show_modal', 'modalEditType');
        }

        $itemType = ItemType::findOrFail($request->input('id'));

        // Check if a new image is uploaded
        if ($request->hasFile('image_item')) {
            // Delete the old image if it exists
            if ($itemType->image_item && Storage::disk('public')->exists($itemType->image_item)) {
                Storage::disk('public')->delete($itemType->image_item);
            }

            // Store the new image
            $imagePath = $request->file('image_item')->store('item_types', 'public');
            $itemType->image_item = $imagePath;
        }

        // Update price item, remove Rp and trim the input
        $itemType->price_item = (int) str_replace('Rp', '', trim($request->input('price_item')));

        // Update other fields
        $itemType->name_item = $request->input('name_item');
        $itemType->role = $request->input('role');

        $itemType->save();

        return redirect()->back()->with('success', 'Item type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $itemType = ItemType::findOrFail($id);

        // Check if the item is associated with laundry or ironing
        $isInLaundry = $itemType->laundry()->exists();
        $isInIroning = $itemType->ironing()->exists();

        if ($isInLaundry || $isInIroning) {
            return redirect()->back()->with('error', 'Item type cannot be deleted because it is associated with laundry or ironing data.');
        }

        // Check if the image exists in storage and delete it
        if ($itemType->image_item && Storage::disk('public')->exists($itemType->image_item)) {
            Storage::disk('public')->delete($itemType->image_item);
        }

        $itemType->delete();

        return redirect()->back()->with('success', 'Item type deleted successfully');
    }
}
